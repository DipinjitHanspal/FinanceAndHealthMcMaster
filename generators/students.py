import csv
import random
import names
import psycopg2


# Track macIDs and student_numbers in entries to prevent duplicates
student_numbers = []
macIDs = []

## Use the names library to generate a random last name
def generate_lname():
    return names.get_last_name()

## Use the names library to generate a random first name
def generate_fname():
    return names.get_first_name()

## Use fname and lname to generate macID
def generate_macID(fname, lname):
    macID = lname + fname[:2]
    i = 1
    while macID in macIDs:
        macID = lname + fname[:2] + str(i)
        i += 1
    return macID

## Generate unique student numbers
def generate_student_num():
    num = random.randint(400000000, 400090000)
    while num in student_numbers:
        num = random.randint(400000000, 400090000)
    return num

def generate_program():
    return programs[random.randint(0, len(programs) - 1)]

def generate_balance():
    return random.randrange(1500, 6000)

programs = ['Computer Science', 'Nursing', 'Engineering', 'Life Science',
            'Health Science', 'Biomedical Engineering', 'Software Engineering',
            'Electrical Engineering', 'Sociology']

headers = ['macID', 'fname', 'lname', 'student_num', 'program', 'balance']

entries = []

for i in range(0, 250):
    row = []
    fname, lname = generate_fname(), generate_lname()
    # Track macID to keep unique for each row
    row.append(generate_macID(fname, lname))
    row.append(fname)
    row.append(lname)
    student_number = generate_student_num()
    row.append(student_number)
    # Track student number to keep unique for each entry
    student_numbers.append(student_number)
    row.append(generate_program())
    row.append(generate_balance())
    entries.append(row)

Write all the entries into students.csv
with open('students.csv', 'w+', newline='') as csvfile:
    writer = csv.writer(csvfile, delimiter=",")
    writer.writerow(headers)
    for row in entries:
        writer.writerow(row)

pg_credential = {
    "hostname" : "capstone.cjcyivdiqo6q.us-west-2.rds.amazonaws.com",
    "port" : 5432,
    "username" : 'capstone',
    "password" : 'capstone',
    "database" : 'Capstone'
}

conn = psycopg2.connect(host=pg_credential['hostname'],
                    port=pg_credential['port'],
                    user=pg_credential['username'],
                    password=pg_credential['password'],
                    database=pg_credential['database'])
# headers = ['macID', 'fname', 'lname', 'student_num', 'program', 'balance', 'timespan_start_preference']
cursor = conn.cursor()
for student in entries:
    cursor.execute("""INSERT INTO mcmaster.student ("macID", "fname", "lname", "student_num", "program", "balance") VALUES(%s, %s, %s, %s, %s, %s)""", 
    tuple(student))
    conn.commit() # <- We MUST commit to reflect the inserted data
cursor.close()