#!/usr/bin/env python3

import re
import os
import datetime

#create a class for every line in error_log
class errorss:
    def __init__(self, line):

        #get date in which error occurred
        self.date = None
        temp = re.findall(r"\[([^\]]+?)\]", line)
        if len(temp) > 0:
            self.date = datetime.datetime.strptime(temp[0], "%a %b %d %H:%M:%S.%f %Y")
       
        #get description of error
        self.description = None
        description = re.findall(r"\[[^\]]+?\] \[([^\]]+?)\]", line) 
        if len(description) > 0:
            self.description = description[0]

        # get ip address of client
        self.ip = None
        temp = re.findall(r"\[client ([^\]]+)", line)
        if len(temp) > 0:
            self.ip = temp[0]

        #get link where the error occurred
        self.link = None 
        temp = re.findall(r"referer: ([^\?|^\s]+)", line)
        if len(temp) > 0:
            self.link = temp[0]

    def get_errors(self):
        return self.ip, self.date, self.description, self.link


def fetchErrors(FILE, regex_string):
    if not FILE:
        return None
    data = []
    for line in FILE:
        for match in re.findall(regex_string, line):
            data.append(match)
    return data
       

if __name__ =="__main__":
    #print it to a file for later extraction
    with open('error.txt', 'w') as f3:
        with open('/var/log/apache2/error_log') as f:
            data = fetchErrors(f, '(^.*~dzablah.*$)')
        if not data:
            print("No data found\n")
            exit(-1)
        for i in data:
            e = errorss(i)
            print(e.get_errors(), file = f3)