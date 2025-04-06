#!C:\Users\PRASHANT\AppData\Local\Programs\Python\Python38\python.exe

import mysql.connector

import cv2
import numpy as np
import face_recognition

conn=mysql.connector.connect(host='localhost',port='3307',database='sep1',user='root',password='')
query="Select * from var"
cursor=conn.cursor()
cursor.execute(query)
records=cursor.fetchall()
for row in records:
    abc=row[1]


imgPrashant=face_recognition.load_image_file(abc)
#imgPrashant=cv2.cvtColor(imgPrashant,cv2.COLOR_BGR2RGB)
imgTest=face_recognition.load_image_file('images1/Compare.jpg')
#imgTest=cv2.cvtColor(imgTest,cv2.COLOR_BGR2RGB)

faceLoc = face_recognition.face_locations(imgPrashant)[0]
encodePrashant=face_recognition.face_encodings(imgPrashant)[0]
#cv2.rectangle(imgPrashant,(faceLoc[3],faceLoc[0]),(faceLoc[1],faceLoc[2]),(255,0,255),2)
faceLoc = face_recognition.face_locations(imgTest)[0]
encodeTest=face_recognition.face_encodings(imgTest)[0]
#cv2.rectangle(imgTest,(faceLoc[3],faceLoc[0]),(faceLoc[1],faceLoc[2]),(255,0,255),2)
results=face_recognition.compare_faces([encodeTest],encodePrashant)
facedis=face_recognition.face_distance([encodeTest],encodePrashant)
print(results)
#cv2.imshow('Prashant',imgPrashant)
#cv2.imshow('Ptest',imgTest)
#cv2.waitKey(0)
