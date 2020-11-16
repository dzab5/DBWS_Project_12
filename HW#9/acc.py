#!/usr/bin/env python3

import re
import os
import datetime

browsers = {"Firefox": 0,
"Safari": 0,
"Chrome": 0,
"Opera" : 0,
}
    
def fetchErrors(FILE, regex_string):
    if not FILE:
        return None
    data = []
    for line in FILE:
        for match in re.findall(regex_string, line):
            data.append(match)
    return data         

class user:
    def __init__(self, line): 

        #get ip address of client
        temp = re.findall('(^[^\\s]+)', line)
        if len(temp) > 0:
            self.ip = temp[0]
        else:
            self.ip = None

        #get browser
        for b in browsers:
            if line.count(b) > 0:
                self.browser = b
                break
        
        #get date of access
        temp = re.findall('\\[(.*)\\]', line)
        if len(temp) > 0:
            self.date = datetime.datetime.strptime(temp[0], "%d/%b/%Y:%H:%M:%S %z")
        else:
            self.date = None
            
        #get link accessed
        temp = re.findall('^.*~dzablah(/[^\\s|\\?|^"]+)', line)
        self.link = None
        if len(temp) > 0:
            self.link = temp[0]
        
    def __str__(self):
        return str(self.ip)+" "+str(self.browser)+" "+str(self.date)+" "+str(self.link)
        

if __name__ =="__main__":
    #print it to a file for later extraction
    with open('access.txt', 'w') as f2:
        with open('/var/log/apache2/access_log') as f:
            data = fetchErrors(f, '(^.*~dzablah.*$)')
        if not data:
            print("No data found\n")
            exit(-1)
        else:
            pass
        users = []
        for line in data:
            u = user(line)
            users.append(u)
            print(u, file = f2)
            
