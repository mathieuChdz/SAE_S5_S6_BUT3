import sys
def decodage(key: str, message: list) -> str:
    """Dechiffre un message chiffre avec le chiffrement RC4 a l'aide de la meme clef qui a ete utilise pour le chiffrement.
    Entrees :
        key (str) -> la clef utilisee pour chiffrer le message sous forme de chaine de caracteres,
            cela peut etre un mot ou une phrase.
        message (list) -> le message chiffre avec le chiffrement RC4, c'est un tableau contenant 
            les caracteres du message sous forme de chaines de caracteres.
    Sortie :
        str -> le message en clair sous forme de chaine de caracteres."""
    
    i = 0
    j = 0
    S = perm(key)
    code = [None] * len(message)
    key = ascii(key)
    
    for n in range(len(message)):
        # On effectue les mêmes opérations que pour le codage, sur le contenu du message
        i = (i + 1) % 256
        j = (j + S[i]) % 256

        S[i], S[j] = S[j], S[i]
        code[n] = chr(S[(S[i] + S[j]) % 256] ^ int(message[n], base=16))  # On construit le nouveau message chiffré
                                                                            # hexa -> int
    
    return ''.join(code)


def ascii(message: str) -> list:
    """Transforme une chaine de caracteres en un tableau contenant les codes ascii correspondant a chauqe caractere.
    Entree :
        message (str) -> un mot ou une phrase sous forme de chaine de caracteres.
    Sortie :
        tab (list) -> un tableau contenant les codes ascii de chaque caractere du message entre en parametre."""
    
    tab = []
    #On parcourt le message caractere par caractere et 
    #on stocke dans un tableau le code ascii correspondant au caractere qu'on regarde
    for i in message:
        tab.append(ord(i))
    return tab





def perm(key: str) -> list:
    """Genere une chaine sous forme de tableau a partir d'une permutation d'une clef entree en parametre.
    Entree :
        key (str) ->  une clef sous forme de chaine de caracteres, cela peut etre un mot ou une phrase.
    Sortie :
        S (list) -> un tableau compose de codes ascii (des entiers) issus d'une permutation de la clef."""
    
    S = list(range(256))
    key = ascii(key)
    
    j = 0
    for i in range(256):
       
        j = (j + S[i] + key[i % len(key)]) % 256
        S[i], S[j] = S[j], S[i]
        
    return S

def affiche_message(message : list):
    """Affiche un message chiffre ou dechiffre avec le chiffrement RC4.
    Entree :
        message (list) -> le message chiffre ou dechiffre avec le chiffrement RC4, c'est un tableau contenant 
            les caracteres du message sous forme de chaines de caracteres.
    Sortie :
        L'affichage du message entre en parametre."""
    
    message_code = str()
    for i in range(len(message)):
        message_code += message[i]
    return message_code




def toList(message: str):
    """Transforme un STR de code hexadécimal en une liste de valeurs assemblées par paires.
    Entree :
        message (str) -> le message chiffre avec le chiffrement RC4, c'est une suite de valeurs héxadécimales
    Sortie :
        Une liste des STR (héxadécimal) par paires."""

    code=[]
    for i in range(0,len (message)-1,2):

        elt=message[i]+message[i+1]
        code.append(elt)

    return code


message=toList(str(sys.argv[1]))


key=""
for i in range(2,len(sys.argv)):   # Rassemblement des différentes      
    key+=sys.argv[i]                    # parties de la clé
    if i<len(sys.argv)-1:
        key+=" "




print(decodage(key,message))







