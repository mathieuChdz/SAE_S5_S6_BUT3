def is_premier(n):
    """
    fonction qui renvoie True si le nombre n passé en paramètres est premier
    et False sinon
    """
    if n <= 0 : 
        return None
    if n==1 :
        return False
    if n==2 or n==3 : 
        return True
    div = n - (n-2)
    while(div < n // 2) :
        if (n % div) == 0 : 
            return False
        div += 1
    return True

def nb_premiers(n):
    """
    fonction qui renvoie la liste des nombres premiers de 1 à n
    entrée : entier n
    sortie : tableau d'entiers
    """
    premiers = []
    if n<=0 :
        return None
    i = 1
    while(i<=n) :
        if is_premier(i) :
            premiers.append(i)
        i = i+1
    return premiers
