import pandas as pd
import sys
import mysql.connector
import xlsxwriter
import pandas as pd
import sys
import mysql.connector
import os
from dotenv import load_dotenv
load_dotenv()

DB_USERNAME = os.getenv('DB_USERNAME')
DB_DATABASE = os.getenv('DB_DATABASE')
DB_PASSWORD = os.getenv('DB_PASSWORD')
DB_PORT = os.getenv('DB_PORT')
print(DB_DATABASE,DB_PASSWORD,DB_PORT,DB_USERNAME)
cnx = mysql.connector.connect(user=DB_USERNAME,
                              password=DB_PASSWORD,
                              host='localhost',
                              port=DB_PORT,
                              database=DB_DATABASE,
                              use_pure=False)
cursor=cnx.cursor(buffered=True)
Destinations=pd.read_sql('select * from destinations', cnx)
Unidades=Destinations['unit'].unique()
Estados=Destinations['state'].unique()
for i in Estados:
    for j in Unidades:
        MyDestiny=Destinations.loc[(Destinations['unit']==j)&(Destinations['state']==i)]
        if(len(MyDestiny)>0):
            print(i,j,MyDestiny['cost'].values[0])
            mySql_insert_query = """INSERT INTO price_lists(description,caliber,type,system,piece,cost,f_vta,f_desp,f_emb,f_desc,f_total) VALUES (%s, %s, %s, %s, %s,%s, %s, %s, %s, %s,%s) """

            record = ('Destino'+str(i)+ ' Unidad '+str(j), i, '-', 'DESTINO',i,MyDestiny['cost'].values[0],1.6,2,1.015,0.95,3.419)
            cursor.execute(mySql_insert_query, record)
            cnx.commit()