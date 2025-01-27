# Bandit

## Level 0 - 6 ls , cd , cat , file , du , find

### Level 0

```ssh -p 2220 bandit0@bandit.labs.overthewire.org```

elk level gaat de username omhoog gelijk aan het nummer vh level

### Level 0 -> Level 1

The password for the next level is stored in a file called readme located in the home directory. Use this password to log into bandit1 using SSH. Whenever you find a password for a level, use SSH (on port 2220) to log into that level and continue the game.

```
bandit0@bandit:~$ cat readme 
The password you are looking for is: ZjLjTmM6FvvyRnrb2rfNWOZOTa6ip5If 
```

### Level 1 -> Level 2

The password for the next level is stored in a file called - located in the home directory

```console
bandit1@bandit:~$ file ./-
./-: ASCII text
bandit1@bandit:~$ cat ./-
263JGJPfgU6LtdEvgfWU1XP5yac29mFx
```

### Level 2 -> Level 3

The password for the next level is stored in a file called spaces in this filename located in the home directory

```
bandit2@bandit:~$ file ./spaces\ in\ this\ filename 
./spaces in this filename: ASCII text
bandit2@bandit:~$ cat spaces\ in\ this\ filename 
MNk8KNH3Usiio41PRUEoDFPqfxLPlSmx
```

### Level 3 -> Level 4

The password for the next level is stored in a hidden file in the inhere directory.

```
bandit3@bandit:~$ cd inhere/
bandit3@bandit:~/inhere$ ls -l
total 0
bandit3@bandit:~/inhere$ ls -alps
total 12
4 drwxr-xr-x 2 root    root    4096 Sep 19 07:08 ./
4 drwxr-xr-x 3 root    root    4096 Sep 19 07:08 ../
4 -rw-r----- 1 bandit4 bandit3   33 Sep 19 07:08 ...Hiding-From-You
bandit3@bandit:~/inhere$ file ...Hiding-From-You
...Hiding-From-You: ASCII text
bandit3@bandit:~/inhere$ cat ...Hiding-From-You 
2WmrDFRmJIq3IPxneAaMGhap0pFhF3NJ
```

```
ls -alps is the same as ls -a -l -p -s
-a: All files are being presented (even if they start if a dot)
-l: The files are being presented in a listing format
-p: A slash (/) is being appended to all directories
-s: The size of each file is being shown
```

### Level 4 -> Level 5

The password for the next level is stored in the only human-readable file in the inhere directory. Tip: if your terminal is messed up, try the “reset” command.

```
bandit4@bandit:~/inhere$ file ./*
./-file00: data
./-file01: data
./-file02: data
./-file03: data
./-file04: data
./-file05: data
./-file06: data
./-file07: ASCII text
./-file08: data
./-file09: data
```

Better solution: ```bandit4@bandit:~/inhere$ find . -type f | xargs file```

```
bandit4@bandit:~/inhere$ file ./* | grep "ASCII"
./-file07: ASCII text
```

```
bandit4@bandit:~/inhere$ cat ./-file07
4oQYVPkxZOOEOO5pTW81FB8j8lxXGUQw
```

### Level 5 -> Level 6

The password for the next level is stored in a file somewhere under the inhere directory and has all of the following properties:

- human-readable
- 1033 bytes in size
- not executable

-size 1033c -> c refers to bytes. b -> blocks

! -executable -> for not executable

```
bandit5@bandit:~/inhere$ find . -type f -size 1033c ! -executable 
./maybehere07/.file2
bandit5@bandit:~/inhere$ cat ./maybehere07/.file2
HWasnPhtq9AVKe0dmk45nxy20cvUa6EG
```

### Level 6 -> Level 7

The password for the next level is stored somewhere on the server and has all of the following properties:

- owned by user bandit7
- owned by group bandit6
- 33 bytes in size

```
bandit6@bandit:~$ find / -type f -user bandit7 -group bandit6 -size 33c
/var/lib/dpkg/info/bandit7.password
bandit6@bandit:~$ cat /var/lib/dpkg/info/bandit7.password
morbNTDkSW6jIlUc0ymOdMaLnOlFVAaj
```

## Level 7 - 12 man, grep, sort, uniq, strings, base64, tr, tar, gzip, bzip2, xxd

### Level 7 -> Level 8

The password for the next level is stored in the file data.txt next to the word millionth

```
bandit7@bandit:~$ cat data.txt | grep "millionth"
millionth       dfwvzFQi4mU0wfNbFOe9RoWskMLg7eEc
```

better solution: ```strings data.txt | grep "millionth"```

### Level 8 -> Level 9

The password for the next level is stored in the file data.txt and is the only line of text that occurs only once

sort everything:
```bandit8@bandit:~$ sort data.txt```

uniq command (-c option to get the count of appearance):

```
bandit8@bandit:~$ sort data.txt | uniq -c
     10 0BKVRLEJQcpNx8wnSPxDLFnFKlQafKK6
     10 0eJPctF8gK96ykGBBaKydhJgxSpTlJtz
     10 0kJ7XHD4gVtNSZIpqyP1V45sfz9OBLFo
     10 0lPOvKhpHZebxji0gdjtGCd5GWiZnNBj
     10 0REUhKk0yMqQOwei6NK9ZqIpE5dVlWWM
     10 1jfUH1m4XCjr7eWAeleGdaNSxFXRtX0l
     10 1VKPEkd0bCtIRwMFVQfY7InulwOFyDsn
     10 2u8fvAzvnaFlvQG3iPt4Wc1TFhPcGxhH
     10 35l6mr3f6TvlJyDwU6aUgJX07cLhr6t9
     10 3FIgajXBiaQAiTMVGo1gxRDSiACNyvvJ
     10 3mNA2le0gfURQKNHVIhGkMNLqLwjyyLN
      1 4CKMh1JI91bUIZZPXDqGanal4xvAg0JM
```

### Level 9 -> Level 10

The password for the next level is stored in the file data.txt in one of the few human-readable strings, preceded by several ‘=’ characters.

```
bandit9@bandit:~$ strings data.txt | grep "=="
}========== the
3JprD========== passwordi
~fDV3========== is
D9========== FGUW5ilLVJrxX9kMYMmlN4MgbpfMiqey
```

### Level 10 -> Level 11

The password for the next level is stored in the file data.txt, which contains base64 encoded data

```
bandit10@bandit:~$ cat data.txt 
VGhlIHBhc3N3b3JkIGlzIGR0UjE3M2ZaS2IwUlJzREZTR3NnMlJXbnBOVmozcVJyCg== -> yes this is definitely base64
bandit10@bandit:~$ base64 -d data.txt 
The password is dtR173fZKb0RRsDFSGsg2RWnpNVj3qRr
```


### Level 11 -> Level 12

The password for the next level is stored in the file data.txt, where all lowercase (a-z) and uppercase (A-Z) letters have been rotated by 13 positions

bandit11@bandit:~$ cat data.txt 
Gur cnffjbeq vf 7k16JArUVv5LxVuJfsSVdbbtaHGlw9D4

go to to decipher ROT13 [https://cyberchef.org](https://cyberchef.org)

![ROT13](./img/ROT13.png)

The password is 7x16WNeHIi5YkIhWsfFIqoognUTyj9Q4

### Level 12 -> Level 13

The password for the next level is stored in the file data.txt, which is a hexdump of a file that has been repeatedly compressed. For this level it may be useful to create a directory under /tmp in which you can work. Use mkdir with a hard to guess directory name. Or better, use the command “mktemp -d”. Then copy the datafile using cp, and rename it using mv (read the **manpages!**)

```grep, sort, uniq, strings, base64, tr, tar, gzip, bzip2, xxd, mkdir, cp, mv, file```

xxd -r -> revert

gzip -d -> decompress

bzip2 -d -> decompress

tar xf -> extract file

```
bandit12@bandit:~$ mkdir /tmp/jasper
bandit12@bandit:~$ cp data.txt /tmp/jasper
bandit12@bandit:~$ cd /tmp/
bandit12@bandit:/tmp/jasper$ ls
data.txt
bandit12@bandit:/tmp/jasper$ xxd -r data.txt > data
bandit12@bandit:/tmp/jasper$ file data
data: gzip compressed data, was "data2.bin", last modified: Thu Sep 19 07:08:15 2024, max compression, from Unix, original size modulo 2^32 574
bandit12@bandit:/tmp/jasper$ mv data file.gz
bandit12@bandit:/tmp/jasper$ gzip -d file.gz
bandit12@bandit:/tmp/jasper$ file file
file: bzip2 compressed data, block size = 900k
bandit12@bandit:/tmp/jasper$ mv file file.bz2
bandit12@bandit:/tmp/jasper$ bzip2 -d file.bz2
bandit12@bandit:/tmp/jasper$ file file 
file: gzip compressed data, was "data4.bin", last modified: Thu Sep 19 07:08:15 2024, max compression, from Unix, original size modulo 2^32 20480
bandit12@bandit:/tmp/jasper$ gzip -d file.gz 
bandit12@bandit:/tmp/jasper$ file file 
file: POSIX tar archive (GNU)
bandit12@bandit:/tmp/jasper$ mv file file.tar
bandit12@bandit:/tmp/jasper$ tar xf file.tar 
bandit12@bandit:/tmp/jasper$ ls
data5.bin  data.txt  file.tar
bandit12@bandit:/tmp/jasper$ file data5.bin 
data5.bin: POSIX tar archive (GNU)
bandit12@bandit:/tmp/jasper$ rm file.tar 
bandit12@bandit:/tmp/jasper$ rm data.txt 
bandit12@bandit:/tmp/jasper$ file data5.bin 
data5.bin: POSIX tar archive (GNU)
bandit12@bandit:/tmp/jasper$ rm file.tar 
bandit12@bandit:/tmp/jasper$ rm data.txt 
bandit12@bandit:/tmp/jasper$ mv data5.bin data.tar
bandit12@bandit:/tmp/jasper$ tar xf data.tar
bandit12@bandit:/tmp/jasper$ ls
data6.bin  data.tar
bandit12@bandit:/tmp/jasper$ file data6.bin 
data6.bin: bzip2 compressed data, block size = 900k
bandit12@bandit:/tmp/jasper$ mv data6.bin data.bz2
bandit12@bandit:/tmp/jasper$ bzip2 -d data.bz2 
bandit12@bandit:/tmp/jasper$ file data
data: POSIX tar archive (GNU)
bandit12@bandit:/tmp/jasper$ mv data data.tar
bandit12@bandit:/tmp/jasper$ tar xf data.tar 
bandit12@bandit:/tmp/jasper$ ls
data8.bin  data.tar
bandit12@bandit:/tmp/jasper$ file data8.bin 
data8.bin: gzip compressed data, was "data9.bin", last modified: Thu Sep 19 07:08:15 2024, max compression, from Unix, original size modulo 2^32 49
bandit12@bandit:/tmp/jasper$ mv data8.bin data.gz
bandit12@bandit:/tmp/jasper$ gzip -d data.gz 
bandit12@bandit:/tmp/jasper$ ls
data  data.tar
bandit12@bandit:/tmp/jasper$ file data
data: ASCII text
bandit12@bandit:/tmp/jasper$ cat data
The password is FO5dwFsc0cbaIiH0h8J2eUks2vdTDwAn
```

## Level 13 - 18  ssh, telnet, nc, openssl, s_client, nmap

### Level 13 -> Level 14

The password for the next level is stored in /etc/bandit_pass/bandit14 and can only be read by user bandit14. For this level, you don’t get the next password, but you get a private SSH key that can be used to log into the next level. Note: localhost is a hostname that refers to the machine you are working on

https://help.ubuntu.com/community/SSH/OpenSSH/Keys

```
bandit13@bandit:~$ ls
sshkey.private
bandit13@bandit:~$ ssh -i sshkey.private bandit14@localhost -p 2220
bandit14@bandit:~$ cat /etc/bandit_pass/bandit14
MU4VWeTyJk8ROof1qqmcBPaLh7lDCPvS
```

### Level 14 -> Level 15

The password for the next level can be retrieved by submitting the password of the current level to port 30000 on localhost.

```
bandit14@bandit:~/.ssh$ nc localhost 30000
MU4VWeTyJk8ROof1qqmcBPaLh7lDCPvS
Correct!
8xCjnmgoKbGLhHFAZlGE5Tmu4M2tKJQo
```

### Level 15 -> Level 16

The password for the next level can be retrieved by submitting the password of the current level to port 30001 on localhost using SSL/TLS encryption.

Helpful note: Getting “DONE”, “RENEGOTIATING” or “KEYUPDATE”? Read the “CONNECTED COMMANDS” section in the manpage.

```
bandit15@bandit:~$ openssl s_client -connect localhost:30001
8xCjnmgoKbGLhHFAZlGE5Tmu4M2tKJQo
Correct!
kSkvUpMQ7lBYyCM4GBPvCvT1BfWRy0Dx
```

OR

```
bandit15@bandit:~$ ncat --ssl localhost 30001
8xCjnmgoKbGLhHFAZlGE5Tmu4M2tKJQo
Correct!
kSkvUpMQ7lBYyCM4GBPvCvT1BfWRy0Dx
```

### Level 16 -> Level 17

The credentials for the next level can be retrieved by submitting the password of the current level to a port on localhost in the range 31000 to 32000. First find out which of these ports have a server listening on them. Then find out which of those speak SSL/TLS and which don’t. There is only 1 server that will give the next credentials, the others will simply send back to you whatever you send to it.

Helpful note: Getting “DONE”, “RENEGOTIATING” or “KEYUPDATE”? Read the “CONNECTED COMMANDS” section in the manpage.

```
bandit16@bandit:~$ nmap localhost -p 31000-32000
Starting Nmap 7.94SVN ( https://nmap.org ) at 2025-01-27 15:08 UTC
Nmap scan report for localhost (127.0.0.1)
Host is up (0.00020s latency).
Not shown: 996 closed tcp ports (conn-refused)
PORT      STATE SERVICE
31046/tcp open  unknown
31518/tcp open  unknown
31691/tcp open  unknown
31790/tcp open  unknown
31960/tcp open  unknown

Nmap done: 1 IP address (1 host up) scanned in 0.14 seconds
```

https://lindevs.com/check-supported-ssl-tls-ciphers-on-server-using-nmap

```
bandit16@bandit:~$ nmap localhost --script ssl-enum-ciphers -p 31518 
Starting Nmap 7.94SVN ( https://nmap.org ) at 2025-01-27 15:12 UTC
Nmap scan report for localhost (127.0.0.1)
Host is up (0.000070s latency).

PORT      STATE SERVICE
31518/tcp open  unknown
| ssl-enum-ciphers: 
|   TLSv1.2: 
|     ciphers: 
|       TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA256 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_AES_128_GCM_SHA256 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA384 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_AES_256_GCM_SHA384 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_ARIA_128_GCM_SHA256 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_ARIA_256_GCM_SHA384 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_CAMELLIA_128_CBC_SHA256 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_CAMELLIA_256_CBC_SHA384 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_CHACHA20_POLY1305_SHA256 (secp256r1) - A
|       TLS_RSA_WITH_AES_128_CBC_SHA (rsa 4096) - A
|       TLS_RSA_WITH_AES_128_CBC_SHA256 (rsa 4096) - A
|       TLS_RSA_WITH_AES_128_CCM (rsa 4096) - A
|       TLS_RSA_WITH_AES_128_CCM_8 (rsa 4096) - A
|       TLS_RSA_WITH_AES_128_GCM_SHA256 (rsa 4096) - A
|       TLS_RSA_WITH_AES_256_CBC_SHA (rsa 4096) - A
|       TLS_RSA_WITH_AES_256_CBC_SHA256 (rsa 4096) - A
|       TLS_RSA_WITH_AES_256_CCM (rsa 4096) - A
|       TLS_RSA_WITH_AES_256_CCM_8 (rsa 4096) - A
|       TLS_RSA_WITH_AES_256_GCM_SHA384 (rsa 4096) - A
|       TLS_RSA_WITH_ARIA_128_GCM_SHA256 (rsa 4096) - A
|       TLS_RSA_WITH_ARIA_256_GCM_SHA384 (rsa 4096) - A
|       TLS_RSA_WITH_CAMELLIA_128_CBC_SHA (rsa 4096) - A
|       TLS_RSA_WITH_CAMELLIA_128_CBC_SHA256 (rsa 4096) - A
|       TLS_RSA_WITH_CAMELLIA_256_CBC_SHA (rsa 4096) - A
|       TLS_RSA_WITH_CAMELLIA_256_CBC_SHA256 (rsa 4096) - A
|     compressors: 
|       NULL
|     cipher preference: client
|     warnings: 
|       Key exchange (secp256r1) of lower strength than certificate key
|   TLSv1.3: 
|     ciphers: 
|       TLS_AKE_WITH_AES_128_GCM_SHA256 (ecdh_x25519) - A
|       TLS_AKE_WITH_AES_256_GCM_SHA384 (ecdh_x25519) - A
|       TLS_AKE_WITH_CHACHA20_POLY1305_SHA256 (ecdh_x25519) - A
|     cipher preference: client
|_  least strength: A

Nmap done: 1 IP address (1 host up) scanned in 0.45 seconds
```

```
bandit16@bandit:~$ nmap localhost --script ssl-enum-ciphers -p 31790
Starting Nmap 7.94SVN ( https://nmap.org ) at 2025-01-27 15:15 UTC
Nmap scan report for localhost (127.0.0.1)
Host is up (0.000083s latency).

PORT      STATE SERVICE
31790/tcp open  unknown
| ssl-enum-ciphers: 
|   TLSv1.2: 
|     ciphers: 
|       TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA256 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_AES_128_GCM_SHA256 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA384 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_AES_256_GCM_SHA384 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_ARIA_128_GCM_SHA256 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_ARIA_256_GCM_SHA384 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_CAMELLIA_128_CBC_SHA256 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_CAMELLIA_256_CBC_SHA384 (secp256r1) - A
|       TLS_ECDHE_RSA_WITH_CHACHA20_POLY1305_SHA256 (secp256r1) - A
|       TLS_RSA_WITH_AES_128_CBC_SHA (rsa 4096) - A
|       TLS_RSA_WITH_AES_128_CBC_SHA256 (rsa 4096) - A
|       TLS_RSA_WITH_AES_128_CCM (rsa 4096) - A
|       TLS_RSA_WITH_AES_128_CCM_8 (rsa 4096) - A
|       TLS_RSA_WITH_AES_128_GCM_SHA256 (rsa 4096) - A
|       TLS_RSA_WITH_AES_256_CBC_SHA (rsa 4096) - A
|       TLS_RSA_WITH_AES_256_CBC_SHA256 (rsa 4096) - A
|       TLS_RSA_WITH_AES_256_CCM (rsa 4096) - A
|       TLS_RSA_WITH_AES_256_CCM_8 (rsa 4096) - A
|       TLS_RSA_WITH_AES_256_GCM_SHA384 (rsa 4096) - A
|       TLS_RSA_WITH_ARIA_128_GCM_SHA256 (rsa 4096) - A
|       TLS_RSA_WITH_ARIA_256_GCM_SHA384 (rsa 4096) - A
|       TLS_RSA_WITH_CAMELLIA_128_CBC_SHA (rsa 4096) - A
|       TLS_RSA_WITH_CAMELLIA_128_CBC_SHA256 (rsa 4096) - A
|       TLS_RSA_WITH_CAMELLIA_256_CBC_SHA (rsa 4096) - A
|       TLS_RSA_WITH_CAMELLIA_256_CBC_SHA256 (rsa 4096) - A
|     compressors: 
|       NULL
|     cipher preference: client
|     warnings: 
|       Key exchange (secp256r1) of lower strength than certificate key
|   TLSv1.3: 
|     ciphers: 
|       TLS_AKE_WITH_AES_128_GCM_SHA256 (ecdh_x25519) - A
|       TLS_AKE_WITH_AES_256_GCM_SHA384 (ecdh_x25519) - A
|       TLS_AKE_WITH_CHACHA20_POLY1305_SHA256 (ecdh_x25519) - A
|     cipher preference: client
|_  least strength: A

Nmap done: 1 IP address (1 host up) scanned in 0.72 seconds
```

bandit16@bandit:~$ ncat --ssl localhost 31518
kSkvUpMQ7lBYyCM4GBPvCvT1BfWRy0Dx
kSkvUpMQ7lBYyCM4GBPvCvT1BfWRy0Dx

```
bandit16@bandit:~$ ncat --ssl localhost 31790
kSkvUpMQ7lBYyCM4GBPvCvT1BfWRy0Dx
Correct!
-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAvmOkuifmMg6HL2YPIOjon6iWfbp7c3jx34YkYWqUH57SUdyJ
imZzeyGC0gtZPGujUSxiJSWI/oTqexh+cAMTSMlOJf7+BrJObArnxd9Y7YT2bRPQ
Ja6Lzb558YW3FZl87ORiO+rW4LCDCNd2lUvLE/GL2GWyuKN0K5iCd5TbtJzEkQTu
DSt2mcNn4rhAL+JFr56o4T6z8WWAW18BR6yGrMq7Q/kALHYW3OekePQAzL0VUYbW
JGTi65CxbCnzc/w4+mqQyvmzpWtMAzJTzAzQxNbkR2MBGySxDLrjg0LWN6sK7wNX
x0YVztz/zbIkPjfkU1jHS+9EbVNj+D1XFOJuaQIDAQABAoIBABagpxpM1aoLWfvD
KHcj10nqcoBc4oE11aFYQwik7xfW+24pRNuDE6SFthOar69jp5RlLwD1NhPx3iBl
J9nOM8OJ0VToum43UOS8YxF8WwhXriYGnc1sskbwpXOUDc9uX4+UESzH22P29ovd
d8WErY0gPxun8pbJLmxkAtWNhpMvfe0050vk9TL5wqbu9AlbssgTcCXkMQnPw9nC
YNN6DDP2lbcBrvgT9YCNL6C+ZKufD52yOQ9qOkwFTEQpjtF4uNtJom+asvlpmS8A
vLY9r60wYSvmZhNqBUrj7lyCtXMIu1kkd4w7F77k+DjHoAXyxcUp1DGL51sOmama
+TOWWgECgYEA8JtPxP0GRJ+IQkX262jM3dEIkza8ky5moIwUqYdsx0NxHgRRhORT
8c8hAuRBb2G82so8vUHk/fur85OEfc9TncnCY2crpoqsghifKLxrLgtT+qDpfZnx
SatLdt8GfQ85yA7hnWWJ2MxF3NaeSDm75Lsm+tBbAiyc9P2jGRNtMSkCgYEAypHd
HCctNi/FwjulhttFx/rHYKhLidZDFYeiE/v45bN4yFm8x7R/b0iE7KaszX+Exdvt
SghaTdcG0Knyw1bpJVyusavPzpaJMjdJ6tcFhVAbAjm7enCIvGCSx+X3l5SiWg0A
R57hJglezIiVjv3aGwHwvlZvtszK6zV6oXFAu0ECgYAbjo46T4hyP5tJi93V5HDi
Ttiek7xRVxUl+iU7rWkGAXFpMLFteQEsRr7PJ/lemmEY5eTDAFMLy9FL2m9oQWCg
R8VdwSk8r9FGLS+9aKcV5PI/WEKlwgXinB3OhYimtiG2Cg5JCqIZFHxD6MjEGOiu
L8ktHMPvodBwNsSBULpG0QKBgBAplTfC1HOnWiMGOU3KPwYWt0O6CdTkmJOmL8Ni
blh9elyZ9FsGxsgtRBXRsqXuz7wtsQAgLHxbdLq/ZJQ7YfzOKU4ZxEnabvXnvWkU
YOdjHdSOoKvDQNWu6ucyLRAWFuISeXw9a/9p7ftpxm0TSgyvmfLF2MIAEwyzRqaM
77pBAoGAMmjmIJdjp+Ez8duyn3ieo36yrttF5NSsJLAbxFpdlc1gvtGCWW+9Cq0b
dxviW8+TFVEBl1O4f7HVm6EpTscdDxU+bCXWkfjuRb7Dy9GOtt9JPsX8MBTakzh3
vBgsyi/sN3RqRBcGU40fOoZyfAMT8s1m/uYv52O6IgeuZ/ujbjY=
-----END RSA PRIVATE KEY-----
```

```
┌──(osboxes㉿osboxes)-[~]
└─$ nano test.private
┌──(osboxes㉿osboxes)-[~]
└─$ chmod 400 test.private 
┌──(osboxes㉿osboxes)-[~]
└─$ ssh -i test.private -p 2220 bandit17@bandit.labs.overthewire.org
bandit17@bandit:~$
```

### Level 17 -> Level 18

There are 2 files in the homedirectory: passwords.old and passwords.new. The password for the next level is in passwords.new and is the only line that has been changed between passwords.old and passwords.new

NOTE: if you have solved this level and see ‘Byebye!’ when trying to log into bandit18, this is related to the next level, bandit19

```
bandit17@bandit:~$ sort passwords.new passwords.old | uniq -u
ktfgBvpMzWKR5ENj26IbLGSblgUG9CzB
x2gLTTjFwMOhQ8oWNbMN362QKxfRqGlO
```

OR

```
bandit17@bandit:~$ diff passwords.old passwords.new 
42c42
< ktfgBvpMzWKR5ENj26IbLGSblgUG9CzB
---
> x2gLTTjFwMOhQ8oWNbMN362QKxfRqGlO
```

```
┌──(osboxes㉿osboxes)-[~]
└─$ ssh -p 2220 bandit18@bandit.labs.overthewire.org 
Byebye !
Connection to bandit.labs.overthewire.org closed.
```

### Level 18 -> Level 19

The password for the next level is stored in a file readme in the homedirectory. Unfortunately, someone has modified .bashrc to log you out when you log in with SSH.

```
┌──(osboxes㉿osboxes)-[~]
└─$ man ssh | grep terminal
       -T      Disable pseudo-terminal allocation.
       -t      Force pseudo-terminal allocation.  This can be used to execute arbitrary screen-based programs on a remote machine,  which  can  be
       If an interactive session is requested, ssh by default will only request a pseudo-terminal (pty) for interactive sessions when  the  client
       If a pseudo-terminal has been allocated, the user may use the escape characters noted below.
       If  no  pseudo-terminal  has been allocated, the session is transparent and can be used to reliably transfer binary data.  On most systems,
       When a pseudo-terminal has been requested, ssh supports a number of functions through the use of an escape character.
       SSH_ASKPASS           If  ssh  needs a passphrase, it will read the passphrase from the current terminal if it was run from a terminal.  If
                             ssh does not have a terminal associated with it but DISPLAY and SSH_ASKPASS are set,  it  will  execute  the  program
```

```
┌──(osboxes㉿osboxes)-[~]
└─$ ssh -p 2220 bandit18@bandit.labs.overthewire.org -T
                         _                     _ _ _   
                        | |__   __ _ _ __   __| (_) |_ 
                        | '_ \ / _` | '_ \ / _` | | __|
                        | |_) | (_| | | | | (_| | | |_ 
                        |_.__/ \__,_|_| |_|\__,_|_|\__|
                                                       

                      This is an OverTheWire game server. 
            More information on http://www.overthewire.org/wargames

bandit18@bandit.labs.overthewire.org's password: 
ls
readme
cat readme      
cGWpMaKXVwDUNgPAVJbWYuGHVn9zl3j8
```

### Level 19 -> Level 20

To gain access to the next level, you should use the setuid binary in the homedirectory. Execute it without arguments to find out how to use it. The password for this level can be found in the usual place (/etc/bandit_pass), after you have used the setuid binary.

```
bandit19@bandit:~$ ls
bandit20-do
bandit19@bandit:~$ ./bandit20-do 
Run a command as another user.
  Example: ./bandit20-do id
bandit19@bandit:~$ ./bandit20-do id
uid=11019(bandit19) gid=11019(bandit19) euid=11020(bandit20) groups=11019(bandit19)
bandit19@bandit:~$ ./bandit20-do cat /etc/bandit_pass/bandit20
0qXahG8ZjOVMN9Ghs7iOWsCfZyXOUbYO
```

### Level 20 -> Level 21

There is a setuid binary in the homedirectory that does the following: it makes a connection to localhost on the port you specify as a commandline argument. It then reads a line of text from the connection and compares it to the password in the previous level (bandit20). If the password is correct, it will transmit the password for the next level (bandit21).

NOTE: Try connecting to your own network daemon to see if it works as you think

```ssh, nc, cat, bash, screen, tmux, Unix ‘job control’ (bg, fg, jobs, &, CTRL-Z, …)```

```
bandit20@bandit:~$ ./suconnect 
Usage: ./suconnect <portnumber>
This program will connect to the given port on localhost using TCP. If it receives the correct password from the other side, the next password is transmitted back.
bandit20@bandit:~$ cat /etc/bandit_pass/bandit20
0qXahG8ZjOVMN9Ghs7iOWsCfZyXOUbYO
bandit20@bandit:~$ nmap -p- localhost
Starting Nmap 7.94SVN ( https://nmap.org ) at 2025-01-27 16:20 UTC
Nmap scan report for localhost (127.0.0.1)
Host is up (0.00011s latency).
Not shown: 65511 closed tcp ports (conn-refused)
PORT      STATE    SERVICE
22/tcp    open     ssh
1111/tcp  open     lmsocialserver
1234/tcp  filtered hotline
```

Open a new terminal:

```
bandit20@bandit:~$ cat /etc/bandit_pass/bandit20 | nc -l -p 1234
EeoULMCra2q0dSkYj561DX7s1CpBuOBt
```

```
bandit20@bandit:~$ ./suconnect 1234
Read: 0qXahG8ZjOVMN9Ghs7iOWsCfZyXOUbYO
Password matches, sending next password
```

## Level 21 - 23 cron, crontab, crontab(5) (use “man 5 crontab” to access this)

### Level 21 -> Level 22

A program is running automatically at regular intervals from cron, the time-based job scheduler. Look in /etc/cron.d/ for the configuration and see what command is being executed.

```
bandit21@bandit:~$ cd /etc/cron.d
bandit21@bandit:/etc/cron.d$ ls
cronjob_bandit22  cronjob_bandit23  cronjob_bandit24  e2scrub_all  otw-tmp-dir  sysstat
bandit21@bandit:/etc/cron.d$ cat cronjob_bandit22
@reboot bandit22 /usr/bin/cronjob_bandit22.sh &> /dev/null
* * * * * bandit22 /usr/bin/cronjob_bandit22.sh &> /dev/null
bandit21@bandit:/etc/cron.d$ cat /usr/bin/cronjob_bandit22.sh
#!/bin/bash
chmod 644 /tmp/t7O6lds9S0RqQh9aMcz6ShpAoZKF7fgv
cat /etc/bandit_pass/bandit22 > /tmp/t7O6lds9S0RqQh9aMcz6ShpAoZKF7fgv
bandit21@bandit:/etc/cron.d$ cat /tmp/t7O6lds9S0RqQh9aMcz6ShpAoZKF7fgv
tRae0UfB9v0UzbCdn9cY0gQnds9GF58Q
```

### Level 22 -> Level 23

A program is running automatically at regular intervals from cron, the time-based job scheduler. Look in /etc/cron.d/ for the configuration and see what command is being executed.

NOTE: Looking at shell scripts written by other people is a very useful skill. The script for this level is intentionally made easy to read. If you are having problems understanding what it does, try executing it to see the debug information it prints.

```
bandit22@bandit:~$ cd /etc/cron.d
bandit22@bandit:/etc/cron.d$ ls
cronjob_bandit22  cronjob_bandit23  cronjob_bandit24  e2scrub_all  otw-tmp-dir  sysstat
bandit22@bandit:/etc/cron.d$ cat cronjob_bandit23
@reboot bandit23 /usr/bin/cronjob_bandit23.sh  &> /dev/null
* * * * * bandit23 /usr/bin/cronjob_bandit23.sh  &> /dev/null
bandit22@bandit:/etc/cron.d$ cat /usr/bin/cronjob_bandit23.sh
#!/bin/bash

myname=$(whoami)
mytarget=$(echo I am user $myname | md5sum | cut -d ' ' -f 1)

echo "Copying passwordfile /etc/bandit_pass/$myname to /tmp/$mytarget"

cat /etc/bandit_pass/$myname > /tmp/$mytarget

bandit22@bandit:/etc/cron.d$ echo "I am user bandit23" | md5sum | cut -d ' ' -f 1
8ca319486bfbbc3663ea0fbe81326349
bandit22@bandit:/etc/cron.d$ cat /tmp/8ca319486bfbbc3663ea0fbe81326349 (hash)
0Zf11ioIjMVN551jX3CmStKLYqjk54Ga
```

### Level 23 -> Level 24

A program is running automatically at regular intervals from cron, the time-based job scheduler. Look in /etc/cron.d/ for the configuration and see what command is being executed.

NOTE: This level requires you to create your own first shell-script. This is a very big step and you should be proud of yourself when you beat this level!

NOTE 2: Keep in mind that your shell script is removed once executed, so you may want to keep a copy around…

```
bandit23@bandit:~$ cd /etc/cron.d/
bandit23@bandit:/etc/cron.d$ ls
cronjob_bandit22  cronjob_bandit23  cronjob_bandit24  e2scrub_all  otw-tmp-dir  sysstat
bandit23@bandit:/etc/cron.d$ cat cronjob_bandit24
@reboot bandit24 /usr/bin/cronjob_bandit24.sh &> /dev/null
* * * * * bandit24 /usr/bin/cronjob_bandit24.sh &> /dev/null
bandit23@bandit:/etc/cron.d$ cat /usr/bin/cronjob_bandit24.sh
#!/bin/bash

myname=$(whoami)

cd /var/spool/$myname/foo
echo "Executing and deleting all scripts in /var/spool/$myname/foo:"
for i in * .*;
do
    if [ "$i" != "." -a "$i" != ".." ];
    then
        echo "Handling $i"
        owner="$(stat --format "%U" ./$i)"
        if [ "${owner}" = "bandit23" ]; then
            timeout -s 9 60 ./$i
        fi
        rm -f ./$i
    fi
done
```

Make a script: [24.sh](./24.sh)

```
bandit23@bandit:/tmp/jasper123$ cp /tmp/24.sh /var/spool/bandit24/foo/
bandit23@bandit:/tmp/jasper123$ cat /tmp/bandit24_password
cat: /tmp/bandit24_password: No such file or directory

WAIT FOR the cronjob to be executed

bandit23@bandit:/tmp/jasper123$ cat /tmp/bandit24_password
gb8KRRCsshuZXI0tUuR6ypOFjiZbf3G8
```

## Level 24 - 26

### Level 24 -> Level 25

A daemon is listening on port 30002 and will give you the password for bandit25 if given the password for bandit24 and a secret numeric 4-digit pincode. There is no way to retrieve the pincode except by going through all of the 10000 combinations, called brute-forcing.
You do not need to create new connections each time

Maak het bruteforce script ([brute-force.sh](./brute-force.sh))

```
bandit24@bandit:/tmp$ nano brute-force.sh
```

``` sh
#!/bin/bash

# Bandit24's password
password="gb8KRRCsshuZXI0tUuR6ypOFjiZbf3G8"

# Loop through all possible 4-digit pins
for pin in {0000..9999}; do
    echo "$password $pin" 
done | nc localhost 30002
```

```bandit24@bandit:/tmp$ chmod 777 brute-force.sh```

```
bandit24@bandit:/tmp$ ./brute-force.sh
Wrong! Please enter the correct current password and pincode. Try again.
Correct!
The password of user bandit25 is iCi86ttT4KSNe1armKiwbQNmB3YJP3q4
```

(pin was 9297)

### Level 25 -> Level 26

Logging in to bandit26 from bandit25 should be fairly easy… The shell for user bandit26 is not /bin/bash, but something else. Find out what it is, how it works and how to break out of it.

NOTE: if you’re a Windows user and typically use Powershell to ssh into bandit: Powershell is known to cause issues with the intended solution to this level. You should use command prompt instead.

```ssh, cat, more, vi, ls, id, pwd```

```
bandit25@bandit:~$ cat /etc/passwd | grep bandit26
bandit26:x:11026:11026:bandit level 26:/home/bandit26:/usr/bin/showtext

bandit25@bandit:~$ cat /etc/shells 
# /etc/shells: valid login shells
/usr/bin/showtext

``` sh
bandit25@bandit:~$ cat /usr/bin/showtext 
#!/bin/sh

export TERM=linux

exec more ~/text.txt
exit 0

```

```
bandit25@bandit:~$ $TERM
xterm-256color

bandit25@bandit:~$ cat /home/bandit26/text.txt 
cat: /home/bandit26/text.txt: Permission denied

bandit25@bandit:~$ showtext 
more: cannot open /home/bandit25/text.txt: No such file or directory

bandit25@bandit:~$ whatis more
more (1)             - display the contents of a file in a terminal
```

#### Reduce the size of the terminal to enable 'more' to paging through text one screenful at a time. 
#### Max height = 6

```
ssh -t -i bandit26.sshkey bandit26@localhost -p 2220 /bin/sh
```

```
# enter v (for vi)

:e /etc/bandit_passwd/bandit26
s0773xxkk0MXfdqOfPRVr9L3jJBUOgCZ
```

### Level 26 -> Level 27

Good job getting a shell! Now hurry and grab the password for bandit27!

```ls```

```
:set shell=/bin/bash
:!ls -la
total 36
drwxr-xr-x  3 root     root     4096 Oct 16 14:00 .
drwxr-xr-x 41 root     root     4096 Oct 16 14:00 ..
-rwsr-x---  1 bandit27 bandit26 7296 Oct 16 14:00 bandit27-do
-rw-r--r--  1 root     root      220 May 15  2017 .bash_logout
-rw-r--r--  1 root     root     3526 May 15  2017 .bashrc
-rw-r--r--  1 root     root      675 May 15  2017 .profile
drwxr-xr-x  2 root     root     4096 Oct 16 14:00 .ssh
-rw-r-----  1 bandit26 bandit26  258 Oct 16 14:00 text.txt
:!./bandit27-do cat /etc/bandit_pass/bandit27
upsNCc7vzaRDx6oZC6GiR6ERwe1MowGB
```

## Level 27 - 31 git

### Level 27 -> Level 28

There is a git repository at ssh://bandit27-git@localhost/home/bandit27-git/repo via the port 2220. The password for the user bandit27-git is the same as for the user bandit27.

Clone the repository and find the password for the next level.

```git```

```
bandit27@bandit:/tmp/jasper1234$ git clone ssh://bandit27-git@localhost:2220/home/bandit27-git/repo
Cloning into 'repo'...
The authenticity of host '[localhost]:2220 ([127.0.0.1]:2220)' can't be established.
ED25519 key fingerprint is SHA256:C2ihUBV7ihnV1wUXRb4RrEcLfXC5CXlhmAAM/urerLY.
This key is not known by any other names.
Are you sure you want to continue connecting (yes/no/[fingerprint])? yes
Could not create directory '/home/bandit27/.ssh' (Permission denied).
Failed to add the host to the list of known hosts (/home/bandit27/.ssh/known_hosts).
                         _                     _ _ _   
                        | |__   __ _ _ __   __| (_) |_ 
                        | '_ \ / _` | '_ \ / _` | | __|
                        | |_) | (_| | | | | (_| | | |_ 
                        |_.__/ \__,_|_| |_|\__,_|_|\__|
                                                       

                      This is an OverTheWire game server. 
            More information on http://www.overthewire.org/wargames

bandit27-git@localhost's password: 
remote: Enumerating objects: 3, done.
remote: Counting objects: 100% (3/3), done.
remote: Compressing objects: 100% (2/2), done.
remote: Total 3 (delta 0), reused 0 (delta 0), pack-reused 0
Receiving objects: 100% (3/3), 286 bytes | 286.00 KiB/s, done.
bandit27@bandit:/tmp/jasper1234$ cd repo/
bandit27@bandit:/tmp/jasper1234/repo$ ls
README
bandit27@bandit:/tmp/jasper1234/repo$ cat README 
The password to the next level is: Yz9IpL0sBcCeuG7m9uQFt8ZNpS4HZRcN
```

### Level 28 -> Level 29

There is a git repository at ssh://bandit28-git@localhost/home/bandit28-git/repo via the port 2220. The password for the user bandit28-git is the same as for the user bandit28.

Clone the repository and find the password for the next level.

```
bandit28@bandit:/tmp/jasper123456$ git clone ssh://bandit28-git@localhost:2220/home/bandit28-git/repo
bandit28@bandit:/tmp/jasper123456$ cd repo/
bandit28@bandit:/tmp/jasper123456/repo$ ls
README.md
bandit28@bandit:/tmp/jasper123456/repo$ cat README.md 
# Bandit Notes
Some notes for level29 of bandit.

## credentials

- username: bandit29
- password: xxxxxxxxxx
```

```
bandit28@bandit:/tmp/jasper123456/repo$ git log
commit 817e303aa6c2b207ea043c7bba1bb7575dc4ea73 (HEAD -> master, origin/master, origin/HEAD)
Author: Morla Porla <morla@overthewire.org>
Date:   Thu Sep 19 07:08:39 2024 +0000

    fix info leak

commit 3621de89d8eac9d3b64302bfb2dc67e9a566decd
Author: Morla Porla <morla@overthewire.org>
Date:   Thu Sep 19 07:08:39 2024 +0000

    add missing data

commit 0622b73250502618babac3d174724bb303c32182
Author: Ben Dover <noone@overthewire.org>
Date:   Thu Sep 19 07:08:39 2024 +0000

    initial commit of README.md

bandit28@bandit:/tmp/jasper123456/repo$ git checkout 3621de89d8eac9d3b64302bfb2dc67e9a566decd
bandit28@bandit:/tmp/jasper123456/repo$ cat README.md 
# Bandit Notes
Some notes for level29 of bandit.

## credentials

- username: bandit29
- password: 4pT1t5DENaYuqnqvadYs1oE4QLCdjmJ7
```

### Level 29 -> Level 30

There is a git repository at ssh://bandit29-git@localhost/home/bandit29-git/repo via the port 2220. The password for the user bandit29-git is the same as for the user bandit29.

Clone the repository and find the password for the next level.

Randomly got it in challenge 27:

```
bandit27@bandit:/tmp$ cd repo
bandit27@bandit:/tmp/repo$ ls
code  README.md
bandit27@bandit:/tmp/repo$ cat README.md
# Bandit Notes
Some notes for bandit30 of bandit.

## credentials

- username: bandit30
- password: qp30ex3VLz5MDG1n91YowTv4Q8l7CDZL
```

```
bandit29@bandit:/tmp/jasper1234567$ git clone ssh://bandit29-git@localhost:2220/home/bandit29-git/repo
bandit29@bandit:/tmp/jasper1234567/repo$ cat README.md 
# Bandit Notes
Some notes for bandit30 of bandit.

## credentials

- username: bandit30
- password: <no passwords in production!>
bandit29@bandit:/tmp/jasper1234567/repo$ git log
commit 6ac7796430c0f39290a0e29a4d32e5126544b022 (HEAD -> master, origin/master, origin/HEAD)
Author: Ben Dover <noone@overthewire.org>
Date:   Thu Sep 19 07:08:41 2024 +0000

    fix username

commit e65a928cca4db1863b478cf5e93d1d5b1c1bd6b2
Author: Ben Dover <noone@overthewire.org>
Date:   Thu Sep 19 07:08:41 2024 +0000

    initial commit of README.md
bandit29@bandit:/tmp/jasper1234567/repo$ git branch -r
  origin/HEAD -> origin/master
  origin/dev
  origin/master
  origin/sploits-dev
bandit29@bandit:/tmp/jasper1234567/repo$ git checkout dev
branch 'dev' set up to track 'origin/dev'.
Switched to a new branch 'dev'
bandit29@bandit:/tmp/jasper1234567/repo$ cat README.md 
# Bandit Notes
Some notes for bandit30 of bandit.

## credentials

- username: bandit30
- password: qp30ex3VLz5MDG1n91YowTv4Q8l7CDZL
```

### Level 30 -> Level 31

There is a git repository at ssh://bandit30-git@localhost/home/bandit30-git/repo via the port 2220. The password for the user bandit30-git is the same as for the user bandit30.

Clone the repository and find the password for the next level.

git tag:  A tag is used to label and mark a specific commit in the history.
It is usually used to mark release points (eg. v1.0, etc.).

Although a tag may appear similar to a branch, a tag, however, does not change. It points directly to a specific commit in the history and will not change unless explicitly updated.

You will not be able to checkout the tags if it's not locally in your repository so first, you have to fetch the tags to your local repository. 

```
bandit30@bandit:/tmp/jasper321$ git clone ssh://bandit30-git@localhost:2220/home/bandit30-git/repo
bandit30@bandit:/tmp/jasper321/repo$ git tag
secret
bandit30@bandit:/tmp/jasper321/repo$ git show secret
fb5S2xb7bRyFmAvQYQGEqsbhVyJqhnDy
```

### Level 31 -> Level 32

There is a git repository at ssh://bandit31-git@localhost/home/bandit31-git/repo via the port 2220. The password for the user bandit31-git is the same as for the user bandit31.

Clone the repository and find the password for the next level.

```
bandit31@bandit:/tmp/jasper4321$ git clone ssh://bandit31-git@localhost:2220/home/bandit31-git/repo 
bandit31@bandit:/tmp/jasper4321/repo$ cat README.md 
This time your task is to push a file to the remote repository.
Details:
    File name: key.txt
    Content: 'May I come in?'
    Branch: master
bandit31@bandit:/tmp/jasper4321/repo$ echo "May I come in?">key.txt
bandit31@bandit:/tmp/jasper4321/repo$ git add -f key.txt
bandit31@bandit:/tmp/jasper4321/repo$ git commit -m key.txt
[master ac33239] key.txt
 1 file changed, 1 insertion(+)
 create mode 100644 key.txt
bandit31@bandit:/tmp/jasper4321/repo$ git push origin master
remote: ### Attempting to validate files... ####
remote: 
remote: .oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.
remote: 
remote: Well done! Here is the password for the next level:
remote: 3O9RfhqyAlVBEZpVb6LYStshZoqoSx5K 
remote: 
remote: .oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.
remote: 
To ssh://localhost:2220/home/bandit31-git/repo
 ! [remote rejected] master -> master (pre-receive hook declined)
error: failed to push some refs to 'ssh://localhost:2220/home/bandit31-git/repo'
```

## Level 32 - 33 sh, man

### Level 32 -> Level 33

After all this git stuff, it’s time for another escape. Good luck!

```
┌──(osboxes㉿osboxes)-[~]
└─$ ssh -p 2220 bandit32@bandit.labs.overthewire.org
--[ Playing the games ]--

  This machine might hold several wargames.
  If you are playing "somegame", then:

    * USERNAMES are somegame0, somegame1, ...
    * Most LEVELS are stored in /somegame/.
    * PASSWORDS for each level are stored in /etc/somegame_pass/.

--[ Tips ]--

  This machine has a 64bit processor and many security-features enabled
  by default, although ASLR has been switched off.  The following
  compiler flags might be interesting:

    -m32                    compile for 32bit
    -fno-stack-protector    disable ProPolice
    -Wl,-z,norelro          disable relro

  In addition, the execstack tool can be used to flag the stack as
  executable on ELF binaries.

  Finally, network-access is limited for most levels by a local
  firewall.

--[ Tools ]--

 For your convenience we have installed a few useful tools which you can find
 in the following locations:

    * gef (https://github.com/hugsy/gef) in /opt/gef/
    * pwndbg (https://github.com/pwndbg/pwndbg) in /opt/pwndbg/
    * gdbinit (https://github.com/gdbinit/Gdbinit) in /opt/gdbinit/
    * pwntools (https://github.com/Gallopsled/pwntools)
    * radare2 (http://www.radare.org/)

--[ More information ]--

  For more information regarding individual wargames, visit
  http://www.overthewire.org/wargames/

WELCOME TO THE UPPERCASE SHELL
>> ls
sh: 1: LS: Permission denied
>> $0
$ vim

:r /etc/bandit_pass/bandit33

Qdtbs5D5i2vJwkO8mEyYEyTL8izoeJ0
```

**Explanation: Here we get an interactive shell by inserting $0 in the fake shell, then we run vim end read the password for the next level.**

### Level 33 -> Level 34

At this moment, level 34 does not exist yet.
