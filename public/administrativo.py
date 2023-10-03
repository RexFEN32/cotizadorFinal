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
product_tables=['selective_heavy_load_frames','quotation protectors']
quotation=pd.read_sql("select * from quotations where id=" +str(id),cnx)
products=pd.read_sql("select * from cart_products where quotation_id=" +str(id),cnx)
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


#aki voy a trae r todos los datos
tablas=['double_deep_crossbars', 
'double_deep_floors', 
'double_deep_floor_reinforcements', 
'double_deep_heavy_load_frames', 
'double_deep_joist_box25s', 
'double_deep_joist_box25_caliber14s', 
'double_deep_joist_box2s', 
'double_deep_joist_box2_caliber14s', 
'double_deep_joist_c2_s', 
'double_deep_joist_chairs', 
'double_deep_joist_l25_caliber14s', 
'double_deep_joist_l25_s', 
'double_deep_joist_l2_caliber14s', 
'double_deep_joist_l2_s', 
'double_deep_joist_lrs', 
'double_deep_joist_structurals', 
'double_deep_miniature_frames', 
'double_deep_spacers', 
'double_deep_structural_frames', 
'freights', 
'grills', 
'installations', 
'packagings', 
'quot25_j_galvanized_panels', 
'quot25_j_painted_panels', 
'quot2_j_galvanized_panels', 
'quot2_j_painted_panels', 
'quotation_administratives', 
'quotation_installs', 
'quotation_protectors', 
'quotation_specials', 
'quotation_travel_assignments', 
'quotation_uninstalls', 
'quot_chair_j_galvanized_panels', 
'quot_chair_j_painted_panels', 
'selective_crossbars', 
'selective_floors', 
'selective_floor_reinforcements', 
'selective_heavy_load_frames', 
'selective_joist_box25s', 
'selective_joist_box25_caliber14s', 
'selective_joist_box2s', 
'selective_joist_box2_caliber14s', 
'selective_joist_c2_s', 
'selective_joist_chairs', 
'selective_joist_l25_caliber14s', 
'selective_joist_l25_s', 
'selective_joist_l2_caliber14s', 
'selective_joist_l2_s', 
'selective_joist_lrs', 
'selective_joist_structurals', 
'selective_miniature_frames', 
'selective_spacers', 
'selective_structural_frames', 
'uninstalls', 
'wood', ]
pricelist_protectors=pd.read_sql('select * from price_list_protectors',cnx)
quotation_protectors=pd.read_sql('select quotation_protectors.*, protectors.sku from quotation_protectors  inner join protectors on protectors.protector=quotation_protectors.protector where quotation_id ='+str(id),cnx)
quotation_shlf=pd.read_sql('select * from selective_heavy_load_frames where quotation_id ='+str(id),cnx)
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
worksheet.merge_range('C6:C8', 'PDA', blue_header_format)
worksheet.merge_range('D6:D8', 'SKU	', blue_header_format)
worksheet.merge_range('E6:E8', 'CANT', blue_header_format)	
worksheet.merge_range('F6:F8', 'DESCRIPCION', blue_header_format)	
worksheet.merge_range('G6:G8', 'CTO UNIT', blue_header_format)	
worksheet.merge_range('H6:H8', 'CTO TOTAL', blue_header_format)	
worksheet.merge_range('I6:I8', 'CALIBRE	', blue_header_format)
worksheet.merge_range('J6:J8', 'KG UNIT	', blue_header_format)
worksheet.merge_range('K6:K8', 'KG TOTAL', blue_header_format)	
worksheet.merge_range('L6:L8', 'CTO X KG', blue_header_format)	
worksheet.merge_range('M6:M8', 'M2 UNIT	', blue_header_format)
worksheet.merge_range('N6:N8', 'M2 TOT', blue_header_format)

row_count=9

for i in range(0,len(quotation_protectors)):
    n=4
    row_count=row_count+n
    
    worksheet.write('C'+str(9+i*n), str(i*n+1), blue_content)
    worksheet.write('D'+str(9+i*n), quotation_protectors['sku'].values[i], blue_content)
    worksheet.write('E'+str(9+i*n), str(quotation_protectors['amount'].values[i]), blue_content)
    worksheet.write('F'+str(9+i*n), quotation_protectors['protector'].values[i], blue_content)
    worksheet.write('G'+str(9+i*n), quotation_protectors['cost'].values[i], blue_content)
    worksheet.write('H'+str(9+i*n), quotation_protectors['amount'].values[i]*quotation_protectors['cost'].values[i], blue_content)
    worksheet.write('I'+str(9+i*n), 'NA', blue_content)
    worksheet.write('J'+str(9+i*n),str(quotation_protectors['total_weight'].values[i]/quotation_protectors['amount'].values[i])+'kg', blue_content)
    worksheet.write('K'+str(9+i*n),str(quotation_protectors['total_weight'].values[i])+'kg', blue_content)
    worksheet.write('L'+str(9+i*n),quotation_protectors['amount'].values[i]*quotation_protectors['cost'].values[i]/quotation_protectors['total_weight'].values[i], blue_content)
    worksheet.write('M'+str(9+i*n),'NA', blue_content)
    worksheet.write('N'+str(9+i*n),'NA', blue_content)
    for j in range(0,len(pricelist_protectors)):
        worksheet.write('C'+str(9+i*n+1+j), str(i*n+2+j), blue_content)
        worksheet.write('D'+str(9+i*n+1+j), pricelist_protectors['sku'].values[j], blue_content)
        worksheet.write('E'+str(9+i*n+1+j), str(pricelist_protectors['amount'].values[j]), blue_content)
        worksheet.write('F'+str(9+i*n+1+j), pricelist_protectors['piece'].values[j], blue_content)
        worksheet.write('G'+str(9+i*n+1+j), pricelist_protectors['cost'].values[j], blue_content)
        worksheet.write('H'+str(9+i*n+1+j), pricelist_protectors['amount'].values[j]*pricelist_protectors['cost'].values[j], blue_content)
        worksheet.write('I'+str(9+i*n+1+j),pricelist_protectors['caliber'].values[j], blue_content)
        worksheet.write('J'+str(9+i*n+1+j),str(pricelist_protectors['kg_m2'].values[j])+'kg', blue_content)
        worksheet.write('K'+str(9+i*n+1+j),str(pricelist_protectors['kg_m2'].values[j]*pricelist_protectors['amount'].values[j])+'kg', blue_content)
        worksheet.write('L'+str(9+i*n+1+j), pricelist_protectors['cost'].values[j]/pricelist_protectors['kg_m2'].values[j], blue_content)
        worksheet.write('M'+str(9+i*n+1+j), pricelist_protectors['kg_m2'].values[j], blue_content)
        worksheet.write('N'+str(9+i*n+1+j), pricelist_protectors['amount'].values[j]*pricelist_protectors['kg_m2'].values[j], blue_content)

for i in range(0,len(quotation_shlf)):
    n=4
    
    
    worksheet.write('C'+str(row_count), str(row_count), blue_content)
    worksheet.write('D'+str(row_count), quotation_shlf['sku'].values[i], blue_content)
    worksheet.write('E'+str(row_count), str(quotation_shlf['amount'].values[i]), blue_content)
    worksheet.write('F'+str(row_count), 'MARCO '+ quotation_shlf['model'].values[i]+' '+str(quotation_shlf['total_m2'].values[i])+'M', blue_content)
    worksheet.write('G'+str(row_count), quotation_shlf['total_price'].values[i]/quotation_shlf['amount'].values[i]/3.19, blue_content)
    worksheet.write('H'+str(row_count), quotation_shlf['total_price'].values[i]/3.19, blue_content)
    worksheet.write('I'+str(row_count), quotation_shlf['caliber'], blue_content)
    worksheet.write('J'+str(row_count),str(quotation_shlf['total_kg'].values[i]/quotation_shlf['amount'].values[i])+'kg', blue_content)
    worksheet.write('K'+str(row_count),str(quotation_shlf['total_kg'].values[i])+'kg', blue_content)
    worksheet.write('L'+str(row_count),quotation_shlf['total_price'].values[i]/quotation_shlf['total_kg'].values[i], blue_content)
    worksheet.write('M'+str(row_count),quotation_shlf['total_m2'].values[i]/quotation_shlf['amount'].values[i], blue_content)
    worksheet.write('N'+str(row_count),quotation_shlf['total_m2'].values[i], blue_content)
    #aki ban las piezas
    worksheet.write('C'+str(row_count+1), str(row_count), blue_content)
    worksheet.write('D'+str(row_count+1), 'TC046363', blue_content)
    worksheet.write('E'+str(row_count+1), str(quotation_shlf['total_crossbars'].values[i]), blue_content)
    worksheet.write('F'+str(row_count+1), 'TORNILLLO GALV DE 5/16 * POR 3/4" DE LARGO GRADO 5', blue_content)
    

    row_count=row_count+n

trow=row_count





#TOTALES
worksheet.merge_range('C'+str(trow+1)+':E'+str(trow), 'TOTAL (EQV M.N)', blue_header_format_bold)
worksheet.write_formula('H'+str(trow),'{=SUM(H9:H'+str(trow-1)+')}',blue_footer_format_bold)
worksheet.write_formula('K'+str(trow),'{=SUM(K9:K'+str(trow-1)+')}',blue_footer_format_bold)
worksheet.write_formula('N'+str(trow),'{=SUM(N9:N'+str(trow-1)+')}',blue_footer_format_bold)




# worksheet.write('K'+str(trow), str(cobros['amount'].sum()), blue_content)
# worksheet.write('L'+str(trow), str(cobros['exchange_sell'].values[0]*cobros['amount'].sum()), blue_content_bold)


#RESUMEN
worksheet.merge_range('D'+str(trow+3)+':E'+str(trow+4),'RESUMEN DE KILOS',blue_header_format_bold)
#subtabla 1, kilos
worksheet.write('D'+str(trow+5),'KILOS',blue_header_format)
worksheet.write('E'+str(trow+5),'CALIBRE',blue_header_format)

worksheet.write('D'+str(trow+6),0,blue_content)
worksheet.write('E'+str(trow+6),0,blue_content)
worksheet.write('D'+str(trow+7),0,blue_content)
worksheet.write('E'+str(trow+7),0,blue_content)
worksheet.write('D'+str(trow+8),0,blue_footer_format_bold)
#subtabla2 costos
worksheet.merge_range('H'+str(trow+4)+':K'+str(trow+4),'RESUMEN DE COSTOS',blue_header_format_bold)
worksheet.write('L'+str(trow+4),'POSICION',blue_header_format)
worksheet.write('M'+str(trow+4),'KILOS',blue_header_format)
worksheet.write('N'+str(trow+4),'PORCENTAJE',blue_header_format)

worksheet.merge_range('H'+str(trow+5)+':K'+str(trow+5),'CONTRATO UNITARIO SOLO MATERIALES',blue_header_format)
worksheet.merge_range('H'+str(trow+6)+':K'+str(trow+6),'CONTRATO UNITARIO SOLO ARMADO',blue_header_format)
worksheet.merge_range('H'+str(trow+7)+':K'+str(trow+7),'CONTRATO UNITARIO SOLO TRASLADO',blue_header_format)
worksheet.merge_range('H'+str(trow+8)+':K'+str(trow+8),'CONTRATO UNITARIO COMBINADO',blue_header_format)


worksheet.write('L'+str(trow+5),0,blue_content)
worksheet.write('M'+str(trow+5),0,blue_content)
worksheet.write('N'+str(trow+5),0,blue_content)

worksheet.write('L'+str(trow+6),0,blue_content)
worksheet.write('M'+str(trow+6),0,blue_content)
worksheet.write('N'+str(trow+6),0,blue_content)

worksheet.write('L'+str(trow+7),0,blue_content)
worksheet.write('M'+str(trow+7),0,blue_content)
worksheet.write('N'+str(trow+7),0,blue_content)

worksheet.write('L'+str(trow+8),0,blue_content)
worksheet.write('M'+str(trow+8),0,blue_content)
worksheet.write('N'+str(trow+8),0,blue_content)
#TODO: calcular bien esto, to6al menos iva

worksheet.set_column('A:A',15)

worksheet.set_column('D:D',20)
worksheet.set_column('F:F',25)
worksheet.set_column('L:L',15)
worksheet.set_column('G:G',15)
worksheet.set_column('H:H',15)
worksheet.set_column('I:N',15)
worksheet.set_column('P:T',15)

#worksheet.set_landscape()
worksheet.set_paper(9)
worksheet.fit_to_pages(1, 1)  
workbook.close()