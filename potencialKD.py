#import numpy as np
import sys

def calcular_potencial_electrico_D(q, r, opc):
    # Definir constantes
    k = 8.99e9    # Constante de Coulomb en N*m^2/C^2

    # Validar cantidad de cargas
    if len(q) < 1 or len(r) < 1:
        return print("Ambas listas deben tener al menos un elemento")
    elif len(q) != len(r):
        return print("La cantidad de cargas(q) debe ser igual a la cantidad de distancias(r)")
    else:
        try:
            # Calcular el potencial eléctrico
            potencial = [k * q[i] / r[i] for i in range(len(q))]
            V_total = sum(potencial)

            # Imprimir el resultado
            print("El potencial eléctrico entre las cargas es: {:.2e} voltios".format(V_total))

            # Ver potencial por cada carga si el usuario lo pide
            if opc == 1:
                for i in range(len(q)):
                    print(f"El potencial eléctrico para la carga {i+1} es = {potencial[i]:.2e} voltios")
        except IndexError:
            print("La lista de distancias 'r' no tiene suficientes elementos para calcular el potencial eléctrico")

q = list(map(float, sys.argv[1].split()))
r = list(map(float, sys.argv[2].split()))
opc = int(sys.argv[3])

calcular_potencial_electrico_D(q, r, opc)

# Ejemplo de uso
'''
Cant_Cargas = 3
q = [2e-9, -5e-9, 3e-9]
r = [0.02, 0.02, 0.04]
opc = 1

calcular_potencial_electrico_D(Cant_Cargas, q, r, opc)
'''
