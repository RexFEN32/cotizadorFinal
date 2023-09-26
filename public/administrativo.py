import sys
import mysql.connector
import xlsxwriter
import pandas as pd
import sys
import mysql.connector
import os
from dotenv import load_dotenv
load_dotenv()
#ESTE ARGUMENTO NO SE USA EN ESTE REPORTE, SERÁ 0 SIEMPRE UWU
id=str(sys.argv[1])
#configurar la conexion a la base de datos
DB_USERNAME = os.getenv('DB_USERNAME')
DB_DATABASE = os.getenv('DB_DATABASE')
DB_PASSWORD = os.getenv('DB_PASSWORD')
DB_PORT = os.getenv('DB_PORT')

a_color='#354F84'
b_color='#91959E'
# Conectar a DB
cnx = mysql.connector.connect(user=DB_USERNAME,
                              password=DB_PASSWORD,
                              host='localhost',
                              port=DB_PORT,
                              database=DB_DATABASE,
                              use_pure=False)
#Seccion para traer informacion de la base
query = ('SELECT * from customers where id =1')

# join para cobros
# cobros=pd.read_sql('Select cobros.* ,customers.customer,internal_orders.invoice, users.name from ((cobros inner join internal_orders on internal_orders.id = cobros.order_id) inner join customers on customers.id = internal_orders.customer_id )inner join users on cobros.capturo=users.id',cnx)

quotation=pd.read_sql("select * from quotations where id=" +str(id),cnx)
#traer datos de los pedidos
# pedidos=pd.read_sql("""Select internal_orders.* ,customers.clave,customers.alias,
# coins.exchange_sell, coins.coin, coins.symbol,coins.code
# from ((
#     internal_orders
#     inner join customers on customers.id = internal_orders.customer_id )
#     inner join coins on internal_orders.coin_id = coins.id)
#      """,cnx)
writer = pd.ExcelWriter('storage/report/administrativo'+str(id)+'.xlsx', engine='xlsxwriter')

workbook = writer.book
##FORMATOS PARA EL TITULO------------------------------------------------------------------------------
rojo_l = workbook.add_format({
    'bold': 0,
    'border': 0,
    'align': 'center',
    'valign': 'vcenter',
    #'fg_color': 'yellow',
    'font_color': 'red',
    'font_size':16})
negro_s = workbook.add_format({
    'bold': 0,
    'border': 0,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'black',
    'font_size':12})
negro_b = workbook.add_format({
    'bold': 2,
    'border': 0,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'black',
    'font_size':13,
    
    'text_wrap': True,
    'num_format': 'dd/mm/yyyy'}) 
rojo_b = workbook.add_format({
    'bold': 2,
    'border': 0,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'red',
    'font_size':13})      

#FORMATOS PARA CABECERAS DE TABLA --------------------------------
header_format = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'center',
    'fg_color': 'yellow',
    'border': 1,})

blue_header_format = workbook.add_format({
    'bold': True,
    'bg_color': a_color,
    'text_wrap': True,
    'valign': 'top',
    'align': 'center',
    'border_color':'white',
    'font_color': 'white',
    'border': 1})
blue_header_format_bold = workbook.add_format({
    'bold': True,
    'bg_color': a_color,
    'text_wrap': True,
    'valign': 'top',
    'align': 'center',
    'border_color':'white',
    'font_color': 'white',
    'num_format': '[$$-409]#,##0.00',
    'border': 1,
    'font_size':13})
blue_footer_format_bold = workbook.add_format({
    'bold': True,
    'bg_color': a_color,
    'text_wrap': True,
    'valign': 'top',
    'align': 'center',
    'border_color':'white',
    'font_color': 'white',
    'border': 1,
    'num_format': '[$$-409]#,##0.00',
    'font_size':11})
red_header_format = workbook.add_format({
    'bold': True,
    'bg_color': b_color,
    'text_wrap': True,
    'valign': 'top',
    'align': 'center',
    'border_color':'white',
    'font_color': 'white',
    'border': 1})

red_header_format_bold = workbook.add_format({
    'bold': True,
    'bg_color': b_color,
    'text_wrap': True,
    'valign': 'top',
    'align': 'center',
    'border_color':'white',
    'font_color': 'white',
    'border': 1,
    'font_size':13})


#FORMATOS PARA TABLAS PER CE------------------------------------

blue_content = workbook.add_format({
    'border': 1,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'black',
    
    'border_color':a_color,
    'font_size':10,
    'num_format': '[$$-409]#,##0.00'})

blue_content_bold = workbook.add_format({
    'bold': True,
    'border': 1,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'black',
    'font_size':11,
    'border_color':a_color,
    'num_format': '[$$-409]#,##0.00'})

blue_content_bold_dll = workbook.add_format({
    'bold': True,
    'border': 1,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'black',
    'font_size':11,
    'bg_color': '#b4e3b1',
    'border_color':a_color,
    'num_format': '[$$-409]#,##0.00'})
blue_content_date = workbook.add_format({
    'border': 1,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'black',
    'font_size':9,
    'border_color':a_color,
    'num_format': 'dd/mm/yyyy'})
#FOOTER FORMATS---------------------------------------------------------
observaciones_format = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#BDD7EE',
    'border': 1})

blue_content_dll = workbook.add_format({
    'border': 1,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'black',
    'bg_color': '#b4e3b1',
    'border_color':a_color,
    'font_size':10,
    'num_format': '[$$-409]#,##0.00'})
total_cereza_format = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'border': 1})
df=quotation[['id','user_id']]

df[0:1].to_excel(writer, sheet_name='Sheet1', startrow=7,startcol=6, header=False, index=False)
worksheet = writer.sheets['Sheet1']
#Encabezado del documento--------------

import datetime

currentDateTime = datetime.datetime.now()
date = currentDateTime.date()
year = date.strftime("%Y")
df[0:1].to_excel(writer, sheet_name='Sheet1', startrow=7,startcol=6, header=False, index=False)
worksheet = writer.sheets['Sheet1']
#Encabezado del documento--------------
worksheet.merge_range('B2:F2', 'REPORTE POR COTIZACION ', negro_b)
worksheet.merge_range('B3:F3', 'ADMINISTRATIVO', negro_s)
worksheet.merge_range('B4:F4', 'COSTOS ', negro_b)

worksheet.write('H2', 'AÑO', negro_b)

worksheet.write('I2', year, negro_b)
worksheet.merge_range('J2:K3', """FECHA DEL REPORTE
DD/MM/AAAA""", negro_b)

worksheet.write('L2', date, negro_b)
worksheet.insert_image("A1", "img/logo/logo.png",{"x_scale": 0.6, "y_scale": 0.6})
worksheet.merge_range('C6:C10', 'PDA', blue_header_format)
worksheet.merge_range('D6:D10', 'PI CANTIDAD', blue_header_format)
worksheet.merge_range('E6:E10', """
FECHA
AAAA-MM-DD""", blue_header_format)

worksheet.merge_range('F6:G9', 'CLIENTE', blue_header_format)
worksheet.write('F10', 'NUMERO', blue_header_format)
worksheet.write('G10', 'NOMBRE CORTO', blue_header_format)

worksheet.merge_range('H6:H10', """ 
                                  MONEDA""", blue_header_format)

worksheet.merge_range('I6:O6', 'DERECHOS ADQUIRIDOS', blue_header_format)
worksheet.merge_range('I7:J9', """IMPORTE TOTAL 
(DERECHOS ADQUIRIDOS) 
SIN IVA""", blue_header_format)
worksheet.write('I10', 'MN', blue_header_format)
worksheet.write('J10', 'DLLS', blue_header_format)


worksheet.merge_range('K7:L9', """COBRADO
(IMPORTE TOTAL COBRADO)
SIN IVA""", blue_header_format)
worksheet.write('K10', 'MN', blue_header_format)
worksheet.write('L10', 'DLLS', blue_header_format)


worksheet.merge_range('M7:N9', """POR COBRAR
(IMPORTE TOTAL POR COBRAR) 
SIN IVA""", blue_header_format)
worksheet.write('M10', 'MN', blue_header_format)
worksheet.write('N10', 'DLLS', blue_header_format)


worksheet.merge_range('O7:O10', '% POR COBRAR DEL PEDIDO INTERNO', blue_header_format)

worksheet.merge_range('P6:S6', """DERECHOS ADQUIRIDOS POR COBRAR CONTABLES""", blue_header_format)
worksheet.merge_range('P7:Q9', """FACTURADO
CxC CONTABLES
(SIN IVA)""", blue_header_format)
worksheet.write('P10', 'MN', blue_header_format)
worksheet.write('Q10', 'DLLS', blue_header_format)


worksheet.merge_range('R7:S9', """POR FACTURAR
CXC CONTABLES
(SIN IVA)""", blue_header_format)
worksheet.write('R10', 'MN', blue_header_format)
worksheet.write('S10', 'DLLS', blue_header_format)

worksheet.merge_range('T6:T10', """

ESTATUS""", blue_header_format)


for i in range(0,len('0000000')):
    worksheet.write('C'+str(i+11), 'DLLS'+str(i), blue_header_format)





trow=11+i

worksheet.merge_range('G'+str(trow)+':H'+str(trow), 'Subtotales', blue_header_format_bold)
#SUBTOTAL PEDIDOS MN
worksheet.write('I'+str(trow), pedidos.loc[pedidos['coin_id']==1,'total'].sum()/1.16, blue_content_bold)
#SUBTOTAL PEDIDOS DLLS
worksheet.write('J'+str(trow), pedidos.loc[pedidos['coin_id']!=1,'total'].sum()/1.16, blue_content_bold_dll)
#TOTAL COBRADO MN
worksheet.write_formula('K'+str(trow),  '{=SUM(K9:K'+str(trow-1)+')}', blue_content_bold)
#TOTAL COBRADO DLLS
worksheet.write_formula('L'+str(trow),  '{=SUM(L9:L'+str(trow-1)+')}', blue_content_bold_dll)
#TOTAL POR COBRAR MN
worksheet.write_formula('M'+str(trow),  '{=SUM(M9:M'+str(trow-1)+')}', blue_content_bold)
#TOTAL POR COBRAR DLLS
worksheet.write_formula('N'+str(trow),  '{=SUM(N9:N'+str(trow-1)+')}',blue_content_bold_dll)
#TOTAL FACTURADO MN
#TOTAL FACTURADOR DLLS
worksheet.write_formula('P'+str(trow),  '{=SUM(P9:P'+str(trow-1)+')}', blue_content_bold)
#TOTAL POR FACTURAR MN
worksheet.write_formula('Q'+str(trow),  '{=SUM(Q9:Q'+str(trow-1)+')}', blue_content_bold_dll)
#TOTAL POR FACTURAR DLLS
worksheet.write_formula('R'+str(trow),  '{=SUM(R9:R'+str(trow-1)+')}',blue_content_bold)
worksheet.write_formula('S'+str(trow),  '{=SUM(S9:S'+str(trow-1)+')}',blue_content_bold_dll)



#TIPO DE CAMBIO
worksheet.merge_range('C'+str(trow)+':D'+str(trow),'TIPO DE CAMBIO',blue_header_format)
worksheet.merge_range('C'+str(trow+1)+':D'+str(trow+1),tc,blue_header_format)
worksheet.merge_range('C'+str(trow+2)+':D'+str(trow+2),' ',blue_header_format)

#TOTALES
worksheet.merge_range('G'+str(trow+1)+':H'+str(trow+1), 'TOTAL (EQV M.N)', blue_header_format_bold)
worksheet.merge_range('G'+str(trow+2)+':H'+str(trow+2), 'GRAN TOTAL', blue_header_format)
worksheet.merge_range('I'+str(trow+1)+':J'+str(trow+2),' ',blue_footer_format_bold)
worksheet.write_formula('I'+str(trow+1)+':J'+str(trow+2),  '{=(I'+str(trow)+'+J'+str(trow)+' * '+str(tc)+')}',blue_footer_format_bold)


worksheet.merge_range('K'+str(trow+1)+':L'+str(trow+2),' ',blue_footer_format_bold)
worksheet.write_formula('K'+str(trow+1)+':L'+str(trow+2),  '{=(K'+str(trow)+'+L'+str(trow)+' * '+str(tc)+')}',blue_footer_format_bold)

worksheet.merge_range('M'+str(trow+1)+':N'+str(trow+2),' ',blue_footer_format_bold)
worksheet.write_formula('M'+str(trow+1)+':N'+str(trow+2),  '{=(M'+str(trow)+'+N'+str(trow)+' * '+str(tc)+')}',blue_footer_format_bold)

worksheet.merge_range('P'+str(trow+1)+':Q'+str(trow+1),' ',blue_footer_format_bold)
worksheet.write_formula('P'+str(trow+1)+':Q'+str(trow+1),  '{=(P'+str(trow)+'+Q'+str(trow)+' * '+str(tc)+')}',blue_footer_format_bold)


worksheet.merge_range('R'+str(trow+1)+':S'+str(trow+1),' ',blue_footer_format_bold)
worksheet.write_formula('R'+str(trow+1)+':S'+str(trow+1),  '{=(R'+str(trow)+'+S'+str(trow)+' * '+str(tc)+')}',blue_footer_format_bold)

worksheet.merge_range('P'+str(trow+2)+':S'+str(trow+2),' ', blue_footer_format_bold)
worksheet.write_formula('P'+str(trow+2)+':S'+str(trow+2),'{=(P'+str(trow)+'+Q'+str(trow)+' * '+str(tc)+'+R'+str(trow)+'+S'+str(trow)+' * '+str(tc)+')}', blue_footer_format_bold)



# worksheet.write('K'+str(trow), str(cobros['amount'].sum()), blue_content)
# worksheet.write('L'+str(trow), str(cobros['exchange_sell'].values[0]*cobros['amount'].sum()), blue_content_bold)


#RESUMEN
worksheet.merge_range('C'+str(trow+3)+':H'+str(trow+3),'RESUMEN DEL REPORTE',blue_header_format_bold)

worksheet.merge_range('C'+str(trow+4)+':F'+str(trow+4),'DERECHOS ADQUIRIDOS',blue_header_format)
worksheet.merge_range('C'+str(trow+5)+':F'+str(trow+5),'COBRADOS',blue_header_format)
worksheet.merge_range('C'+str(trow+6)+':F'+str(trow+6),'POR COBRAR',blue_header_format)
worksheet.merge_range('C'+str(trow+7)+':F'+str(trow+7),'PEDIDOS REPORTADOS',blue_header_format)

worksheet.merge_range('C'+str(trow+8)+':F'+str(trow+8),'PEDIDOS  POR COBRAR MXN',blue_header_format)
worksheet.merge_range('C'+str(trow+9)+':F'+str(trow+9),'PEDIDOS POR COBRAR DLL',blue_header_format)
worksheet.merge_range('C'+str(trow+10)+':F'+str(trow+10),'PEDIDOS TOTALES POR COBRAR',blue_header_format)
worksheet.merge_range('C'+str(trow+11)+':F'+str(trow+11),'PEDIDOS TOTALES COBRADOS',blue_header_format)

#TODO: calcular bien esto, total menos iva
worksheet.merge_range('G'+str(trow+4)+':H'+str(trow+4),' ',blue_content_bold)
worksheet.write_formula('G'+str(trow+4)+':H'+str(trow+4),  '{=(I'+str(trow)+'+J'+str(trow)+' * '+str(tc)+')}',blue_content_bold)


worksheet.merge_range('G'+str(trow+5)+':H'+str(trow+5),' ',blue_content_bold)
worksheet.write_formula('G'+str(trow+5)+':H'+str(trow+5),  '{=(K'+str(trow)+'+L'+str(trow)+' * '+str(tc)+')}',blue_content_bold)

worksheet.merge_range('G'+str(trow+6)+':H'+str(trow+6),' ',blue_content_bold)
worksheet.write_formula('G'+str(trow+6)+':H'+str(trow+6),  '{=(M'+str(trow)+'+N'+str(trow)+' * '+str(tc)+')}',blue_content_bold)

pedidos_x_cobrar=0
pedidos_x_cobrar_mx=0
pedidos_x_cobrar_dll=0
for i in range(0,len(pedidos)):
   if(pedidos['coin_id'].values[i]==1):
        if(pedidos['total'].values[i]- cobros.loc[cobros['order_id']==pedidos['id'].values[i],'amount'].sum()-1<=0):
           x=1 
        else:
            pedidos_x_cobrar_mx=pedidos_x_cobrar_mx+1
   else:#osea si no es moneda nacional
        if(pedidos['total'].values[i]- cobros.loc[cobros['order_id']==pedidos['id'].values[i],'amount'].sum()-1<=0):
        #osease, si ya se cobro
           x=4
        else:
            pedidos_x_cobrar_dll=pedidos_x_cobrar_dll+1
            
worksheet.merge_range('G'+str(trow+7)+':H'+str(trow+7),str(len(pedidos)),blue_content_bold)
pedidos_x_cobrar=pedidos_x_cobrar_mx+pedidos_x_cobrar_dll
worksheet.merge_range('G'+str(trow+8)+':H'+str(trow+8),str(pedidos_x_cobrar_mx),blue_content_bold)
worksheet.merge_range('G'+str(trow+9)+':H'+str(trow+9),str(pedidos_x_cobrar_dll),blue_content_bold)
worksheet.merge_range('G'+str(trow+10)+':H'+str(trow+10),str(pedidos_x_cobrar),blue_content_bold)
worksheet.merge_range('G'+str(trow+11)+':H'+str(trow+11),str(len(pedidos)-pedidos_x_cobrar),blue_content_bold)

#Rellenar
worksheet.merge_range('E'+str(trow)+':F'+str(trow+2),' ',blue_header_format)

worksheet.write('O'+str(trow),' ',blue_content)
worksheet.write('T'+str(trow),' ',blue_content)

worksheet.merge_range('O'+str(trow+1)+':O'+str(trow+2), ' ', blue_header_format)
worksheet.merge_range('T'+str(trow+1)+':T'+str(trow+2), ' ', blue_header_format)

worksheet.set_column('A:A',15)
worksheet.set_column('L:L',15)
worksheet.set_column('G:G',15)
worksheet.set_column('H:H',15)
worksheet.set_column('I:N',15)
worksheet.set_column('P:T',15)

#worksheet.set_landscape()
worksheet.set_paper(9)
worksheet.fit_to_pages(1, 1)  
workbook.close()