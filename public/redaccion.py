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

doc = DocxTemplate("plantilla.docx")

context={
    'cliente':'Cliente prueba sa de cv'
}
doc.render(context) 
doc.save("Cotizacion"+str(sys.argv[1])+".docx")
      