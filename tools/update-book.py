#!/usr/bin/python3

bookId=1
name="test"
author="testname"
hostUrl = 'http://localhost:8000/api/books/'+str(bookId)

try:
    import requests
except:
    print("Requests module not found. Please install python3-pip and run pip3 install requests")
    exit(0)

import json
import sys

response = requests.put(hostUrl,params={"name":name,"author":author})

print(json.dumps(response.json(),sort_keys=True, indent=4))
