import psycopg2
import random
from datetime import date
import pandas as pd
import time 

transID = 0
headers = ['transactionID', 'date', 'time', 'locID', 'student_num', 'foodID']

def str_time_prop(start, end, format, prop):
    """Get a time at a proportion of a range of two formatted times.

    start and end should be strings specifying times formated in the
    given format (strftime-style), giving an interval [start, end].
    prop specifies how a proportion of the interval to be taken after
    start.  The returned time will be in the specified format.
    """

    stime = time.mktime(time.strptime(start, format))
    etime = time.mktime(time.strptime(end, format))

    ptime = stime + prop * (etime - stime)

    return time.strftime(format, time.localtime(ptime))


def random_date(start, end, prop):
    return str_time_prop(start, end, '%m-%d-%Y %X', prop)

# Return tuple of date, time 
def generate_datetime():
    return random_date("1-1-2017 00:00:00", "2-9-2020 22:00:00", random.random())

pg_credential = {
    "hostname" : "capstone.cjcyivdiqo6q.us-west-2.rds.amazonaws.com",
    "port" : 5432,
    "username" : 'capstone',
    "password" : 'capstone',
    "database" : 'Capstone'
}

students = pd.read_csv('students.csv')
food = pd.read_csv('food.csv')
conn = psycopg2.connect(host=pg_credential['hostname'],
                        port=pg_credential['port'],
                        user=pg_credential['username'],
                        password=pg_credential['password'],
                        database=pg_credential['database'])
cursor = conn.cursor()

# Generate 60000 randoms data transactions (~ 15000 per year)
for i in range(60000):
    datetime = generate_datetime()
    locID = random.randrange(0, 20)
    student_num = students.sample(1)['student_num'].tolist()[0]
    foodID = food.sample(1)['ID'].tolist()[0]
    cursor.execute("""INSERT INTO mcmaster.transaction ("transactionID", "datetime", "locID", "student_num", "foodID") VALUES(%s, %s, %s, %s, %s)""", 
    (transID, datetime, locID, student_num, foodID))
    conn.commit() # <- We MUST commit to reflect the inserted data
    transID += 1

cursor.close()