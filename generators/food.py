import random
import csv
import psycopg2
import pandas as pd
import missingno as msno
 
def generate_sample(sample_size=600):
    food = pd.read_csv('food-sources/ABBREV.csv')
    # Filter out babyfood
    filt = food['Shrt_Desc'].str.contains('Babyfood')
    food = food[~filt]
    # Take the following
    food = food[['ID', 'Shrt_Desc',  'Carbohydrt_(g)', 'Energ_Kcal', 'Lipid_Tot_(g)', 'Cholestrl_(mg)', 'Sodium_(mg)', 'Protein_(g)', 'Fiber_TD_(g)', 'Sugar_Tot_(g)']]
    # drop rows where any columns are empty to satisfy NOT NULL for respective db columns
    food = food.dropna(axis=0, how='any')
    sample = food.sample(n=sample_size)
    # return a random sample of the remaining entries
    return sample


headers = ['foodID', 'description', 'carbohydrates', 'calories', 'fat', 'cholesterol', 'sodium', 'protein', 'fibre', 'sugar', 'locationID']
# Use a sample of the food csv write to db 
sample = generate_sample(700)
sample.to_csv('food.csv')
entries = sample.values.tolist()
# print(sample.values.tolist()[0])

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

for food in entries:
    # print(len(food))
    # print(food)
    cursor.execute("""INSERT INTO mcmaster.food ("foodID", "description", "carbohydrates", "calories", "fat", "cholesterol", "sodium", "protein", "fibre", "sugar", "locationID") VALUES(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)""", 
    tuple(food) + tuple(random.randint(0, 19) for _ in range(1)))
    conn.commit() # <- We MUST commit to reflect the inserted data
cursor.close()

