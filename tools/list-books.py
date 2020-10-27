#!/usr/bin/python3

hostUrl = 'http://localhost:8000/api/books'

try:
    import requests
except:
    print("Requests module not found. Please install python3-pip and run pip3 install requests")
    exit(0)
import json
import sys

response = requests.get(hostUrl)

print(json.dumps(response.json(),sort_keys=True, indent=4))
