import pandas as pd
import numpy as np
import pandas as pd
from docxtpl import DocxTemplate,  InlineImage
from docx.shared import Mm
import sys
import mysql.connector
import os
from dotenv import load_dotenv
from datetime import date
print(sys.argv[1])
today = date.today()
load_dotenv()

#configurar la conexion a la base de datos
DB_USERNAME = os.getenv('DB_USERNAME')
DB_DATABASE = os.getenv('DB_DATABASE')
DB_PASSWORD = os.getenv('DB_PASSWORD')
DB_PORT = os.getenv('DB_PORT')
DB_HOST=os.getenv('DB_HOST')

# Conectar a DB
cnx = mysql.connector.connect(user=DB_USERNAME,
                              password=DB_PASSWORD,
                              host=DB_HOST,
                              port=DB_PORT,
                              database=DB_DATABASE,
                              use_pure=False)
cotizacion=pd.read_sql("select * from quotations where id ="+str(sys.argv[1]),cnx)
cliente=pd.read_sql("""select * from customers where customers.id="""+str(cotizacion['customer_id'].values[0]),cnx)
user=pd.read_sql("""select * from users where users.id="""+str(cotizacion['user_id'].values[0]),cnx)
productos=pd.read_sql("""select * from cart_products where cart_product.quotation_id="""+str(cotizacion['id'].values[0]),cnx)
doc = DocxTemplate("plantilla.docx")

context={
    'cliente':cliente['customer'].values[0],
    'direccion':cliente['address'].values[0]+' '+cliente['outdoor'].values[0]+', '+cliente['city'].values[0]+' '+cliente['suburb'].values[0]+' '+cliente['state'].values[0]+', cp: '+str(cliente['zip_code'].values[0]),
    'folio': cotizacion['invoice'].values[0],
    'fecha':today,
    'asesor':user['name'].values[0],

} 
print(context['direccion'])
doc.render(context) 
doc.save("storage/Cotizacion"+str(sys.argv[1])+".docx")
      