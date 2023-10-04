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


#aki voy a trae r todos los datos
tablas={'double_deep_crossbars' : 'double deep crossbars',
'double_deep_floors' : 'double deep floors',
'double_deep_floor_reinforcements' : 'double deep floor reinforcements',
'double_deep_heavy_load_frames' : 'double deep heavy load frames',
'double_deep_joist_box25s' : 'double deep joist box25s',
'double_deep_joist_box25_caliber14s' : 'double deep joist box25 caliber14s',
'double_deep_joist_box2s' : 'double deep joist box2s',
'double_deep_joist_box2_caliber14s' : 'double deep joist box2 caliber14s',
'double_deep_joist_c2_s' : 'double deep joist c2 s',
'double_deep_joist_chairs' : 'double deep joist chairs',
'double_deep_joist_l25_caliber14s' : 'double deep joist l25 caliber14s',
'double_deep_joist_l25_s' : 'double deep joist l25 s',
'double_deep_joist_l2_caliber14s' : 'double deep joist l2 caliber14s',
'double_deep_joist_l2_s' : 'double deep joist l2 s',
'double_deep_joist_lrs' : 'double deep joist lrs',
'double_deep_joist_structurals' : 'double deep joist structurals',
'double_deep_miniature_frames' : 'double deep miniature frames',
'double_deep_spacers' : 'double deep spacers',
'double_deep_structural_frames' : 'double deep structural frames',
'freights' : 'freights',
'grills' : 'grills',
'installations' : 'installations',
'packagings' : 'packagings',
'quot25_j_galvanized_panels' : 'quot25 j galvanized panels',
'quot25_j_painted_panels' : 'quot25 j painted panels',
'quot2_j_galvanized_panels' : 'quot2 j galvanized panels',
'quot2_j_painted_panels' : 'quot2 j painted panels',
'quotation_administratives' : 'quotation administratives',
'quotation_installs' : 'quotation installs',
'quotation_protectors' : '',
'quotation_specials' : 'quotation specials',
'quotation_travel_assignments' : 'quotation travel assignments',
'quotation_uninstalls' : 'quotation uninstalls',
'quot_chair_j_galvanized_panels' : 'quot chair j galvanized panels',
'quot_chair_j_painted_panels' : 'quot chair j painted panels',
'selective_crossbars' : 'selective crossbars',
'selective_floors' : 'selective floors',
'selective_floor_reinforcements' : 'selective floor reinforcements',
'selective_heavy_load_frames' : 'MARCO SELECTIVO',
'selective_joist_box25s' : 'selective joist box25s',
'selective_joist_box25_caliber14s' : 'selective joist box25 caliber14s',
'selective_joist_box2s' : 'selective joist box2s',
'selective_joist_box2_caliber14s' : 'selective joist box2 caliber14s',
'selective_joist_c2_s' : 'selective joist c2 s',
'selective_joist_chairs' : 'selective joist chairs',
'selective_joist_l25_caliber14s' : 'selective joist l25 caliber14s',
'selective_joist_l25_s' : 'selective joist l25 s',
'selective_joist_l2_caliber14s' : 'selective joist l2 caliber14s',
'selective_joist_l2_s' : 'selective joist l2 s',
'selective_joist_lrs' : 'selective joist lrs',
'selective_joist_structurals' : 'selective joist structurals',
'selective_miniature_frames' : 'selective miniature frames',
'selective_spacers' : 'selective spacers',
'selective_structural_frames' : 'selective structural frames',
'uninstalls' : 'uninstalls',
'wood' : 'wood',}
aceros=pd.read_sql('select * from steels ',cnx)
 
products=pd.DataFrame()

for i in tablas:
    p=pd.read_sql('select * from '+i+' where quotation_id = '+str(id),cnx)
    p=p.assign(tabla=i)
    if(('cost' not in p.columns)&(len(p)>0)):
        costo=aceros.loc[aceros['caliber']==p['caliber'].values[0],'cost'].values[0]
        p=p.assign(cost=costo*p.total_kg)
        print(i)
        print(costo)
    products=products.append(p)
products=products.fillna('')
pricelist_protectors=pd.read_sql('select * from price_list_protectors',cnx)
quotation_protectors=pd.read_sql('select quotation_protectors.*, protectors.sku from quotation_protectors  inner join protectors on protectors.protector=quotation_protectors.protector where quotation_id ='+str(id),cnx)
quotation_shlf=pd.read_sql('select * from selective_heavy_load_frames where quotation_id ='+str(id),cnx)
df[0:1].to_excel(writer, sheet_name='Sheet1', startrow=7,startcol=6, header=False, index=False)
pricelist_screw=pd.read_sql('select * from price_list_screws inner join materials on materials.price_list_screw_id= price_list_screws.id',cnx)

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
def ret_na(value):
    if(len(value)>0):
        return value
    else:
        return 'NA'
def num(value):
    if(len(str(value))>0):
        return value
    else:
        return 0

for i in range(0,len(products)):
    piezas=pricelist_screw.loc[pricelist_screw['product'].str.contains(products['tabla'].values[i])]

    n=len(piezas)
    print(n,products['tabla'].values[i],row_count)
    #pda
    worksheet.write('C'+str(row_count), str(i*n+1), blue_content)
    #sku
    worksheet.write('D'+str(row_count), products['sku'].values[i], blue_content)
    worksheet.write('E'+str(row_count), str(products['amount'].values[i]), blue_content)
    #descripcion
    worksheet.write('F'+str(row_count), tablas[products['tabla'].values[i]]+products['protector'].values[i]+' '+products['model'].values[i], blue_content)
    #costos
    worksheet.write('G'+str(row_count), products['cost'].values[i], blue_content)
    worksheet.write('H'+str(row_count), products['amount'].values[i]*products['cost'].values[i], blue_content)
    #calibre
    worksheet.write('I'+str(row_count), ret_na(products['caliber'].values[i]), blue_content)
    #pesos
    worksheet.write('J'+str(row_count),str((num(products['total_weight'].values[i])+num(products['total_kg'].values[i]))/products['amount'].values[i])+'kg', blue_content)
    worksheet.write('K'+str(row_count),str((num(products['total_weight'].values[i])+num(products['total_kg'].values[i])))+'kg', blue_content)
    worksheet.write('L'+str(row_count),products['amount'].values[i]*products['cost'].values[i]/(num(products['total_weight'].values[i])+num(products['total_kg'].values[i])), blue_content)

    worksheet.write('M'+str(row_count),'NA', blue_content)
    worksheet.write('N'+str(row_count),'NA', blue_content)
    row_count=row_count+1
    for j in range(0,n):
        worksheet.write('C'+str(row_count), str(i*n+2+j), blue_content)
        worksheet.write('D'+str(row_count), 'TC..', blue_content)
        worksheet.write('E'+str(row_count), str(piezas['amount'].values[j]), blue_content)
        worksheet.write('F'+str(row_count), piezas['description'].values[j], blue_content)
        worksheet.write('G'+str(row_count), piezas['cost'].values[j], blue_content)
        worksheet.write('H'+str(row_count), piezas['amount'].values[j]*piezas['cost'].values[j], blue_content)
        worksheet.write('I'+str(row_count), piezas['type'].values[j], blue_content)
        worksheet.write('J'+str(row_count),str(0.0), blue_content)
        worksheet.write('K'+str(row_count),str(0.0), blue_content)
        worksheet.write('L'+str(row_count), str(0.0), blue_content)
        worksheet.write('M'+str(row_count), str(0.0), blue_content)
        worksheet.write('N'+str(row_count), str(0.0), blue_content)
        row_count=row_count+1
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