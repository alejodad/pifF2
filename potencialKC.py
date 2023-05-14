#import numpy as np
import sympy as sp
import sys

def calcular_potencial_electrico_C(lambda_,r,l):
    # Definir constantes
    k = 8.99e9    # Constante de Coulomb en N*m^2/C^2

    # Calcular el potencial eléctrico para un sistema de cargas continua - distribución longitudinal de carga
    f = k * lambda_ * l / r
    potencial = sp.integrate(f, sp.symbols('l'))
    potencial_evaluado = potencial.evalf()

    # Imprimir el resultado
    print("El potencial eléctrico es:", potencial_evaluado, "voltios")
    
lambda_ = float(sys.argv[1])
r = float(sys.argv[2])
l = float(sys.argv[3])


calcular_potencial_electrico_C(lambda_,r,l)

    
    # Ejemplo de uso
'''
lambda_ = 1.5e-9 C/m
r = 0.05 m
l = 0.02 m
calcular_potencial_electrico_C(1.5e-9, 0.05, 0.02)
'''
    
