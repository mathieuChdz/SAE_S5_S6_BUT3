#!/usr/bin/python3
import psutil
import json
import datetime

# Obtenir l'uptime et l'heure de démarrage
uptime_info = psutil.cpu_times()
boot_time = datetime.datetime.fromtimestamp(psutil.boot_time()).strftime('%Y-%m-%d %H:%M:%S')

data = {
    'cpu_percent': psutil.cpu_percent(),
    'mem_percent': psutil.virtual_memory().percent,
    'uptime': uptime_info.system,
    'boot_time': boot_time,
}

print("Content-type: application/json\n")
print(json.dumps(data))