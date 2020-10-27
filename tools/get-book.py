#!/usr/bin/python3

import json
import sys

def usage_get():
    print("Usage "+sys.argv[0]+" <existing book id>")
    exit(0)

if len(sys.argv)>1:
    if int(sys.argv[1])>0:
        hostUrl = 'http://localhost:8000/api/books/'+str(sys.argv[1])
else:
    usage_get()

try:
    import requests
except:
    print("Requests module not found. Please install python3-pip and run pip3 install requests")
    exit(0)

response = requests.get(hostUrl)
try:
    print(json.dumps(response.json(),sort_keys=True, indent=4))
except:
    usage_get()
