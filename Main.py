import os
import webbrowser
ipDomain = "192.168.157.0"
def crackPassword():
	pwdFile = open("./Scripts/bruteForceIIS/test/.htpasswd",'r')
	pwdList = pwdFile.read()
	pwdFile.close()
	pwdList = pwdList.split("\n")
	for i in range(len(pwdList)-1):
		pwdList[i] = pwdList[i].split(':')
		print("Mots de passe de l'utilisateur : "+pwdList[i][0])
		print("Hash : "+pwdList[i][1])
		os.system("findmyhash MD5 -h "+pwdList[i][1]+" -g")
	
def scanReseau():
	choix = -1
	while choix != 0:
		print("*1* quels appareils sont connecte a mon reseau ?")
		print("*2* quels ports sont ouvert sur une machine ?")
		print("*3* quels services sont actif sur une machine?")
		print("*0* retour au menu principal")
		choix = input()

		if int(choix) == 1:
			print("voici les appareils connectes a votre reseaux : ")
			os.system("nmap -sP "+ipDomain+"/24")
		elif int(choix) == 2:
			print("Entrer l'addresse ip de la machine a scanner : ")
			ipMachine = raw_input()
			print("voici les ports ouverts de la machine : ")
			os.system("nmap -sV "+ipMachine+" -A -v")
		elif int(choix) == 3:
			pass
	
	
def Main():
	print("______________________________________________________________________________________")
	print("______________________________________________________________________________________")
	print("______________________________________________________________________________________")
	print("______________________________________________________________________________________")
	print("______________________________________________________________________________________")
	print("_________________________________Security Project_____________________________________")
	print("______________________________________________________________________________________")
	print("______________________________________________________________________________________")
	print("______________________________________________________________________________________")
	print("______________________________________________________________________________________")
	print("______________________________________________________________________________________")

	choix = -1

	while choix != 0 :
		print("*1* Injection SQL")
		print("*2* Injection JS")
		print("*3* Brute Force IIS")
		print("*4* File upload")
		print("*5* Directory exploration")
		print("*6* CrackPassword")
		print("*7* Scan reseau")
		print("*0* Quitter")	
		print("Veuillez taper le numero de l\'attaque a executer : ")
		choix = input()
		if int(choix) == 6:
			crackPassword()
		elif int(choix) == 7:
			scanReseau()
		elif int(choix) == 1:
			webbrowser.open("https://github.com/flavien-perier/securityModel3IL")


Main()

