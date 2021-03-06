import urllib
import RPi.GPIO as GPIO

# DS18b20 on pin 4
GPIO.setmode(GPIO.BCM)

# Led on pin 22
GPIO.setup(22, GPIO.OUT)

# Turn led on
GPIO.output(22, GPIO.HIGH)

# Read the temperature and add it to the file
tfile = open("/sys/bus/w1/devices/w1_bus_master1/28-000005209981/w1_slave")
text = tfile.read()
tfile.close
temperature_data = text.split()[-1]
temperature = float(temperature_data[2:])
temperature = temperature/1000
print temperature

# Prepare data to be sent
url = "http://url.com/path/uploadfile.php?PASSWD=123456&TEMPERATURE=" +
str(temperature)

# Send the request
print "Connecting to " + url
response = urllib.urlopen(url).read()
print "Answer:"
print response

# Turn the led off
GPIO.output(22, GPIO.LOW)

# Reset ports
GPIO.cleanup()
