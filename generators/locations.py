import csv
import random
import names
import psycopg2

headers = ['locID', 'name', 'building', 'region']
entries = [[0, 'Booster Juice', 'McMaster University Student Center',''],
[1, 'Bridges Cafe', 'Refactory',''],
[2, 'ByMac', 'David Bradley Athletic Center ',''],
[3, 'Cafe One', 'Michael G. DeGroote Center for Learning & Discover',''],
[4, 'CaFFeINe, the elements', 'Burke Science Building',''],
[5, 'CENTRO', 'Commons Building',''],
[6, 'E-Cafe', 'Engineering Technology Building',''],
[7, 'East Meets West Bistro', 'Mary E. Keyes Residence',''],
[8, 'IAHS Cafe', 'Institute of Applied Health Science Building',''],
[9, 'La Piazza', 'McMaster University Student Center',''],
[10, 'Fireball Cafe', 'John Hodgins Engineering Building',''],
[11, 'Starbucks Coffee', 'McMaster University Student Center',''],
[12, 'The Refactor Cafe', 'H.G. Thode Library',''],
[13, 'Teriyaki Express', 'McMaster University Student Center',''],
[14, 'My Mini Mac', 'Mary E. Keyes Residence',''],
[15, 'Tim Hortons', 'McMaster University Student Center',''],
[16, 'Williams Fresh Cafe', 'Health Sciences Building',''],
[17, 'Bistro', 'DeGroote School of Business',''],
[18, 'Chopped Leaf', 'Peter George Center for Living and Learning',''],
[19, 'Second Cup', 'Peter George Center for Living and Learning','']]

# # Write all the entries into students.csv
# with open('locations.csv', 'w+', newline='') as csvfile:
#     writer = csv.writer(csvfile, delimiter=",")
#     for row in entries:
#         writer.writerow(row)

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
cursor = conn.cursor()

for loc in entries: 
    cursor.execute("""INSERT INTO mcmaster.location ("locID", "name", "building", "region") VALUES(%s, %s, %s, %s)""", (loc[0], loc[1], loc[2], loc[3]))
    conn.commit() # <- We MUST commit to reflect the inserted data

cursor.close()