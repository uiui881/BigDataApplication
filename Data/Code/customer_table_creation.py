# -*- coding: utf-8 -*-
"""
Created on Fri Nov 13 15:46:18 2020

@author: 이서라
"""

import pandas as pd
import random

df = pd.DataFrame(columns=['CUSTOMER_ID', 'SEX_ID', 'AGE_ID', 'NICKNAME'])

for i in range(1, 31):
    customer_id = str('{0:02}'.format(i))
    sex_id = random.randrange(1,3)
    age_id = random.randrange(1,8)
    df.loc[i] = [customer_id, sex_id, age_id, ''] 
    
df.to_csv("D:\학교\빅데이터응용\Data\customer.csv", index=False)
