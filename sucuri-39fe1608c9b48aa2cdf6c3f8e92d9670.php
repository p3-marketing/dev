<?php
/* Sucuri integrity monitor
 * Integrity checking and server side scanning.
 *
 * Copyright (C) 2010, 2011, 2012 Sucuri, LLC
 * http://sucuri.net
 * Do not distribute or share.
 */

$MYMONITOR = "monitor21";
$my_sucuri_encoding = "



LyogU3VjdXJpIGludGVncml0eSBtb25pdG9yIC4gCiAqIENvbm5lY3RzIGJhY2sgaG9tZS4KICog
Q29weXJpZ2h0IChDKSAyMDEwLTIwMTMgU3VjdXJpLCBMTEMKICogRG8gbm90IGRpc3RyaWJ1dGUg
b3Igc2hhcmUuCiAqLwoKCiRTVUNVUklQV0QgPSAiNTM1ZTI2ZWIwZjMzMjRlODA1NmZlNjk1NDk3
NmIwNGM2MmViOTc3ZjJjYzUxIjsKCgppZihpc3NldCgkX0dFVFsndGVzdCddKSkKewogICAgZWNo
byAiT0s6IFN1Y3VyaTogRm91bmRcbiI7CiAgICBleGl0KDApOwp9CgoKCi8qIFZhbGlkIGFyZ3Vt
ZW50LiAqLwppZighaXNzZXQoJF9HRVRbJ3J1biddKSkKewogICAgZXhpdCgwKTsKfQoKCi8qIE11
c3QgaGF2ZSBhbiBJUCBhZGRyZXNzLiAqLwppZighaXNzZXQoJF9TRVJWRVJbJ1JFTU9URV9BRERS
J10pKQp7CiAgICBleGl0KDApOwp9Cgokb3JpZ3JlbW90ZWlwID0gJF9TRVJWRVJbJ1JFTU9URV9B
RERSJ107CgovKiBJZiBjb21pbmcgZnJvbSBjbG91ZGZsYXJlOiAqLwppZihpc3NldCgkX1NFUlZF
UlsnSFRUUF9DRl9DT05ORUNUSU5HX0lQJ10pKQp7CiAgICAkX1NFUlZFUlsnUkVNT1RFX0FERFIn
XSA9ICRfU0VSVkVSWydIVFRQX0NGX0NPTk5FQ1RJTkdfSVAnXTsKfQovKiBDbG91ZFByb3h5IGhl
YWRlcnMuICovCmVsc2UgaWYoaXNzZXQoJF9TRVJWRVJbJ0hUVFBfWF9TVUNVUklfQ0xJRU5USVAn
XSkpCnsKICAgICRfU0VSVkVSWydSRU1PVEVfQUREUiddID0gJF9TRVJWRVJbJ0hUVFBfWF9TVUNV
UklfQ0xJRU5USVAnXTsKfQovKiBNb3JlIGdhdGV3YXkgcmVxdWVzdHMuICovCmVsc2UgaWYoaXNz
ZXQoJF9TRVJWRVJbJ0hUVFBfWF9PUklHX0NMSUVOVF9JUCddKSkKewogICAgJF9TRVJWRVJbJ1JF
TU9URV9BRERSJ10gPSAkX1NFUlZFUlsnSFRUUF9YX09SSUdfQ0xJRU5UX0lQJ107Cn0KZWxzZSBp
Zihpc3NldCgkX1NFUlZFUlsnSFRUUF9DTElFTlRfSVAnXSkpCnsKICAgICRfU0VSVkVSWydSRU1P
VEVfQUREUiddID0gJF9TRVJWRVJbJ0hUVFBfQ0xJRU5UX0lQJ107Cn0KLyogUHJveHkgcmVxdWVz
dHMuICovCmVsc2UgaWYoaXNzZXQoJF9TRVJWRVJbJ0hUVFBfVFJVRV9DTElFTlRfSVAnXSkpCnsK
ICAgICRfU0VSVkVSWydSRU1PVEVfQUREUiddID0gJF9TRVJWRVJbJ0hUVFBfVFJVRV9DTElFTlRf
SVAnXTsKfQovKiBQcm94eSByZXF1ZXN0cy4gKi8KZWxzZSBpZihpc3NldCgkX1NFUlZFUlsnSFRU
UF9YX1JFQUxfSVAnXSkpCnsKICAgICRfU0VSVkVSWydSRU1PVEVfQUREUiddID0gJF9TRVJWRVJb
J0hUVFBfWF9SRUFMX0lQJ107Cn0KLyogTW9yZSBnYXRld2F5IHJlcXVlc3RzLiAqLwplbHNlIGlm
KGlzc2V0KCRfU0VSVkVSWydIVFRQX1hfRk9SV0FSREVEX0ZPUiddKSkKewogICAgJF9TRVJWRVJb
J1JFTU9URV9BRERSJ10gPSAkX1NFUlZFUlsnSFRUUF9YX0ZPUldBUkRFRF9GT1InXTsKfQoKCiRt
eWlwbGlzdCA9IGFycmF5KAonNjkuMTY0LjIxMS4zNycsCic3Mi4xNC4xODcuNTgnLAonNjkuMTY0
LjE5Ni41MycsCic1MC4xMTYuNDcuMTgxJywKJzY2LjIyOC4zNC40OScsCic2Ni4yMjguNDAuMTg1
JywKJzUwLjExNi4zNi45MicsCic1MC4xMTYuMzYuOTMnLAonNTAuMTE2LjMuMTcxJywKJzE5OC41
OC45Ni4yMTInLAonNTAuMTE2LjYzLjIyMScsCicxOTIuMTU1LjkyLjExMicsCicxOTIuODEuMTI4
LjMxJywKJzE5OC41OC4xMDYuMjQ0JywKJzE5Mi4xNTUuOTUuMTM5JywKJzIzLjIzOS45LjIyNycs
CicxOTguNTguMTEyLjEwMycsCicxOTIuMTU1Ljk0LjQzJywKJzE2Mi4yMTYuMTYuMzMnLAonMTA0
LjIzNy4xNDMuMjQyJywKJzEwNC4yMzcuMTM5LjIyNycsCic0NS4zMy43Ni4xNycsCic0NS43OS4y
MTAuNTcnLAonMTczLjIzMC4xMzMuMTY0JywKJzY5LjE2NC4yMTkuNDUnLAonNDUuNzkuMjA3LjEy
NycsCic5Ni4xMjYuMTE3LjIwJywKJzEwNC4yMzcuMTM4LjE2OCcsCgonMjYwMDozYzAwOjpmMDNj
OjkxZmY6ZmVhZTplMTA0JywKJzI2MDA6M2MwMDo6ZjAzYzo5MWZmOmZlODQ6ZTI3NScsCicyNjAw
OjNjMDM6OmYwM2M6OTFmZjpmZWU0OmM5ZjAnLAonMjYwMDozYzAyOjpmMDNjOjkxZmY6ZmVlNDpj
OTk4JywKJzI2MDA6M2MwMDo6ZjAzYzo5MWZmOmZlODQ6ZTIxOCcsCicyNjAwOjNjMDI6OmYwM2M6
OTFmZjpmZWRmOjU4YzYnLAonMjYwMDozYzAyOjpmMDNjOjkxZmY6ZmVkZjo1ODM1JywKJzI2MDA6
M2MwMzo6ZjAzYzo5MWZmOmZlZGY6NmE3YScsCicyNjAwOjNjMDM6OmYwM2M6OTFmZjpmZTcwOjM2
Y2UnLAonMjYwMDozYzAyOjpmMDNjOjkxZmY6ZmU3MDpmMTJkJywKJzI2MDA6M2MwMTo6ZjAzYzo5
MWZmOmZlNzA6NTJiYicsCiIyNjAwOjNjMDI6OmYwM2M6OTFmZjpmZTY5OjRiNjYiLAoiMjYwMDoz
YzAwOjpmMDNjOjkxZmY6ZmU3MDo1MjEzIiwKIjI2MDA6M2MwMzo6ZjAzYzo5MWZmOmZlZGI6Yjlj
ZSIsCiIyNjAwOjNjMDA6OmYwM2M6OTFmZjpmZTZlOmEwNDYiLAoiMjYwMDozYzAyOjpmMDNjOjkx
ZmY6ZmU2ZTphMGRkIiwKIjI2MDA6M2MwMzo6ZjAzYzo5MWZmOmZlNmU6YTBhYyIsCiIyNjAwOjNj
MDI6OmYwM2M6OTFmZjpmZTliOmNjYWMiLAoiMjYwMDozYzAzOjpmMDNjOjkxZmY6ZmU1OTpmMWYi
LAoiMjYwMDozYzAyOjpmMDNjOjkxZmY6ZmU1OTpmYmIiLCAKIjI2MDA6M2MwMzo6ZjAzYzo5MWZm
OmZlNTk6ZjUxIiwKIjI2MDA6M2MwMDo6ZjAzYzo5MWZmOmZlNTk6Zjg0IiwgCicyNjAwOjNjMDA6
OmYwM2M6OTFmZjpmZTFmOjc1Y2InLAonMjYwMDozYzAwOjpmMDNjOjkxZmY6ZmUxZjo3NTdjJywK
JzI2MDA6M2MwMjo6ZjAzYzo5MWZmOmZlMWY6NzUzYycsCidmZTgwOjpmY2ZkOmFkZmY6ZmVlNjo4
MDg3JywKKTsKCgokaXBtYXRjaGVzID0gMDsKCmZvcmVhY2goJG15aXBsaXN0IGFzICRteWlwKQp7
CiAgICBpZihzdHJwb3MoJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10sICRteWlwKSAhPT0gRkFMU0Up
CiAgICB7CiAgICAgICAgJGlwbWF0Y2hlcyA9IDE7CiAgICAgICAgYnJlYWs7CiAgICB9CiAgICBp
ZihzdHJwb3MoJG9yaWdyZW1vdGVpcCwgJG15aXApICE9PSBGQUxTRSkKICAgIHsKICAgICAgICAk
aXBtYXRjaGVzID0gMTsKICAgICAgICBicmVhazsKICAgIH0KfQoKCmlmKCRpcG1hdGNoZXMgPT0g
MCkKewogICAgZWNobyAiRVJST1I6IEludmFsaWQgSVAgQWRkcmVzc1xuIjsKICAgIGV4aXQoMCk7
Cn0KCgovKiBWYWxpZCBrZXkuICovCmlmKCFpc3NldCgkX1BPU1RbJ3NzY3JlZCddKSkKewogICAg
ZWNobyAiRVJST1I6IEludmFsaWQgYXJndW1lbnRcbiI7CiAgICBleGl0KDApOwp9CgoKLyogQ29u
bmVjdCBiYWNrIHRvIGdldCB3aGF0IHRvIHJ1bi4gKi8KaWYoIWZ1bmN0aW9uX2V4aXN0cygnY3Vy
bF9leGVjJykgfHwgaXNzZXQoJF9HRVRbJ25vY3VybCddKSkKewogICAgJHBvc3RkYXRhID0gaHR0
cF9idWlsZF9xdWVyeSgKICAgICAgICAgICAgYXJyYXkoCiAgICAgICAgICAgICAgICAncCcgPT4g
JFNVQ1VSSVBXRCwKICAgICAgICAgICAgICAgICdxJyA9PiAkX1BPU1RbJ3NzY3JlZCddLAogICAg
ICAgICAgICAgICAgKQogICAgICAgICAgICApOwoKICAgICRvcHRzID0gYXJyYXkoJ2h0dHAnID0+
CiAgICAgICAgICAgIGFycmF5KAogICAgICAgICAgICAgICAgJ21ldGhvZCcgID0+ICdQT1NUJywK
ICAgICAgICAgICAgICAgICdoZWFkZXInICA9PiAnQ29udGVudC10eXBlOiBhcHBsaWNhdGlvbi94
LXd3dy1mb3JtLXVybGVuY29kZWQnLAogICAgICAgICAgICAgICAgJ2NvbnRlbnQnID0+ICRwb3N0
ZGF0YQogICAgICAgICAgICAgICAgKQogICAgICAgICAgICApOwoKICAgICRjb250ZXh0ID0gc3Ry
ZWFtX2NvbnRleHRfY3JlYXRlKCRvcHRzKTsKICAgICRteV9zdWN1cmlfZW5jb2RpbmcgPSBmaWxl
X2dldF9jb250ZW50cygiaHR0cHM6Ly8kTVlNT05JVE9SLnN1Y3VyaS5uZXQvaW1vbml0b3IiLCBm
YWxzZSwgJGNvbnRleHQpOwoKICAgIGlmKHN0cm5jbXAoJG15X3N1Y3VyaV9lbmNvZGluZywgIldP
UktFRDoiLDcpID09IDApCiAgICB7CiAgICB9CiAgICBlbHNlCiAgICB7CiAgICAgICAgZWNobyAi
RVJST1I6IFVuYWJsZSB0byBjb21wbGV0ZSAobWlzc2luZyBjdXJsIHN1cHBvcnQgYW5kIGZpbGVf
Z2V0IGZhaWxlZCkuIFBsZWFzZSBjb250YWN0IHN1cHBvcnRAc3VjdXJpLm5ldCBmb3IgZ3VpZGFu
Y2UuXG4iOwogICAgICAgIGV4aXQoMSk7CiAgICB9Cn0KCmVsc2UKewoKICAgICRjaCA9IGN1cmxf
aW5pdCgpOwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1VSTCwgImh0dHBzOi8vJE1ZTU9O
SVRPUi5zdWN1cmkubmV0L2ltb25pdG9yIik7CiAgICBjdXJsX3NldG9wdCgkY2gsIENVUkxPUFRf
UkVUVVJOVFJBTlNGRVIsIHRydWUpOwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1BPU1Qs
IHRydWUpOwogICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1BPU1RGSUVMRFMsICJwPSRTVUNV
UklQV0QmcT0iLiRfUE9TVFsnc3NjcmVkJ10pOyAKICAgIGN1cmxfc2V0b3B0KCRjaCwgQ1VSTE9Q
VF9TU0xfVkVSSUZZUEVFUiwgZmFsc2UpOwoKICAgICRteV9zdWN1cmlfZW5jb2RpbmcgPSBjdXJs
X2V4ZWMoJGNoKTsKICAgIGN1cmxfY2xvc2UoJGNoKTsKCiAgICBpZihzdHJuY21wKCRteV9zdWN1
cmlfZW5jb2RpbmcsICJXT1JLRUQ6Iiw3KSA9PSAwKQogICAgewogICAgfQogICAgZWxzZQogICAg
ewogICAgICAgIGlmKCRteV9zdWN1cmlfZW5jb2RpbmcgPT0gTlVMTCB8fCBzdHJsZW4oJG15X3N1
Y3VyaV9lbmNvZGluZykgPCAzKQogICAgICAgIHsKICAgICAgICAgICAgJG15X3N1Y3VyaV9lbmNv
ZGluZyA9ICJ4MjM1MSI7CiAgICAgICAgfQogICAgICAgIGVjaG8gIkVSUk9SOiBVbmFibGUgdG8g
Y29ubmVjdCBiYWNrIHRvIFN1Y3VyaSAoZXJyb3I6ICRteV9zdWN1cmlfZW5jb2RpbmcpLiBQbGVh
c2UgY29udGFjdCBzdXBwb3J0QHN1Y3VyaS5uZXQgZm9yIGd1aWRhbmNlLlxuIjsKICAgICAgICBl
eGl0KDEpOwogICAgfQp9CgoKJG15X3N1Y3VyaV9lbmNvZGluZyA9ICBiYXNlNjRfZGVjb2RlKAog
ICAgICAgICAgICAgICAgICAgICAgIHN1YnN0cigkbXlfc3VjdXJpX2VuY29kaW5nLCA3KSk7CgoK
ZXZhbCgKICAgICRteV9zdWN1cmlfZW5jb2RpbmcKICAgICk7Cg==

";

/* Encoded to avoid that it gets flagged by AV products or even ourselves :) */
$tempb64 =  
           base64_decode(
                          $my_sucuri_encoding);

eval(  $tempb64 
      );
exit(0); ?>    
    
