import csv
import random
import names


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

headers = {'macID', 'fname', 'lname', 'student_num', 'program', 'balance', 'timespan_start_preference'}

entries = []

for i in range(0, 100):
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
    row.append("")
    entries.append(row)

# Write all the entries into students.csv
with open('students.csv', 'w+', newline='') as csvfile:
    writer = csv.writer(csvfile, delimiter=",")
    for row in entries:
        writer.writerow(row)
