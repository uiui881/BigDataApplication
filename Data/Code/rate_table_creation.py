# -*- coding: utf-8 -*-
"""
Created on Fri Nov 13 16:12:27 2020

@author: 이서라
"""

import pandas as pd
import random

df = pd.DataFrame(columns=['CUSTOMER_ID', 'BRAND_ID', 'STAFF_SERVICE', 'ACCESSIBILITY', 
                           'CONVENIENCE', 'TASTE/MENU', 'PRICE', 'ADDITIONAL_SERVICE', 'SERVICE_FAVORABILITY'])

k = 1
for i in range(1, 31):
    randomlist = random.sample(range(1, 31), 5)
    randomlist.sort()
    for j in range(0, 5):
        customer_id = str('{0:02}'.format(i))
        brand_id = randomlist[j]
        staff_service = random.randrange(1,6)
        accessibility = random.randrange(1,6)
        convenience = random.randrange(1,6)
        tastemenu = random.randrange(1,6)
        price = random.randrange(1,6)
        additional_service = random.randrange(1,6)
        service_favorability = random.randrange(1,6)
        df.loc[k] = [customer_id, brand_id, staff_service, accessibility, 
                     convenience, tastemenu, price, additional_service, service_favorability]
        k = k + 1
        
df.to_csv("D:\학교\빅데이터응용\Data\\rate.csv", index=False)
