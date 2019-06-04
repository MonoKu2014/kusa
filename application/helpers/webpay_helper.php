<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Transbank\Webpay\Configuration;
use Transbank\Webpay\Webpay;

include 'vendor/autoload.php';

function forIntegrationWebpayPlusNormal()
{
    $configuration = new Configuration();
    $configuration->setCommerceCode(33915934);
    $configuration->setPrivateKey(
        "-----BEGIN RSA PRIVATE KEY-----\n".
        "MIIEpQIBAAKCAQEA5dA5RXpwwCvu1wLioryLPbhZNMBGMpfign1RWZEDUdDPF93+\n".
        "llsHnhQ/FNv+YJz4sKE8mVx2Q7KD+Yz1D2/BncyLt4h93Zj1s+xwCnuGK4HDdYAC\n".
        "/NffmqZcOjJpJsmJf6BotjpwMBMQGm13YnRHpa6YVDneXAyWnlNpKuGo+U0hf1dc\n".
        "dN3/R6bvwH/8z1foOH/LzQajqUYYdd3+c/CtB0ZWZ6YCMeGtGcKA4LQgik1Kc4DN\n".
        "DBklZD5obfJCAsUk9/+5VVSnv9mqNkilwLDVoN1OE4kq02VZA0d9ray/NZNKQi3h\n".
        "+yqEueDPcbufXUNzBup7YiTTz44GHBoX5fqxFwIDAQABAoIBAA4vLOnB5eWmkIZK\n".
        "0kwzEPENSMw9tdd3km51Z6j8j1Tka3PQqt8C3VR/cWlLLsctyRe1y/S3RUFmakjj\n".
        "z1hVkIC52EHKteIQh9HEHSI4f4594t+EuCp89HsqG3UoGV9gfxEWiH/+2V/OPWc0\n".
        "LHMyNB3gydwg+j16NW2uPkZ8SR6h6yBBn0ZezDCMFuoAQp49hjzdZTpZ0bgP/4CX\n".
        "MjiJGh5/HQHIAPN9bsjAaPIL7xQpbj5C3UucoXAJ/LsIXjGjwDVHXppVB9Pb8dUT\n".
        "Am9k+sZgoSBXZ+K+CO7MZ+7ZjdB6UVC7B7x5ywTnn7XWimvPsBGIdhmFd29VjwM5\n".
        "XqTkExkCgYEA/SyNjNbL8hsdhBeRrC6d9VGlzt7kZmFHnYX7/urusNIAVf/fRNrn\n".
        "1b46CfGs8FnfZ+5/UlBlNLA8SWGheNUJU2G4QBA8VnFPGEqDysMVPjeGxWQsOJot\n".
        "ePhNK6X7ORR0tYjOZKYLvI1zmDP7P/PuC9OS4PWMng18iExBG3THFKMCgYEA6GDq\n".
        "4IQN9zDzBN/al9vD2tPjaXw2XEzCMb0lGGyiYPzusg+99aKEfOhF99KOXQ3nsEnT\n".
        "HgynJybZYN3K6tjuZTxv2+Q5aDlarjWi1miJy/sw+OWBAYejGwmwy/hInRnVPkUH\n".
        "HCdEJ2C5oPdb+0R+O0PDeB+Jh6pV8ncoKvFARP0CgYEAuhSKAY9KnSsS2aidGCm3\n".
        "TbzyGoe25gzwHzaAThAM2gev2YXUa35d0bscW3y3OH1F99TS3gRbLout891/Whly\n".
        "3kc/rk6AmqRzlw4Fqf0S2wTi2KhU3FFtxLDzv3YinQSM93STBmUI0VBCOwdRzuKR\n".
        "/z1FgnTYIr8U3fT2EaEWRfMCgYEAxdiuYVVNZqagYggNXrnXeNpqhocg6VjZBewa\n".
        "Rz9GyPjQaX4Jp7ckwgwodiUo3IVYO7m/K5huQGFNNrHfcDAeWMcqHbekQN6EHErC\n".
        "R3Zdy/Qj7+XG/nxzHDQV+LN9b3RtIEU5FnlAB57MrQWtpLLeHqtFI2MGfyFBZ9yX\n".
        "sGgS5ikCgYEA4HkuJchZvx3+ndYf/mhnxONnis/MKTyciiBfuTrEMgxdKO8OG8gX\n".
        "VXoqyD7hnuXM/IIngZ9gz9NOijmqjocyxmK4jK9aJYdEsJbwJIw5+G/hZnwfzzYA\n".
        "eY5+sdLFYn8HDPVUYMC7p2HCa1fR0ISTTvG48GL45TeKeoMGS1uLmGE=\n".
        "-----END RSA PRIVATE KEY-----\n"
    );
    $configuration->setPublicCert(
        "-----BEGIN CERTIFICATE-----\n".
        "MIIDqDCCApACCQCyuMi3ARhPSDANBgkqhkiG9w0BAQsFADCBlTELMAkGA1UEBhMC\n".
        "Q0wxETAPBgNVBAgMCFNhbnRpYWdvMREwDwYDVQQHDAhTQU5USUFHTzEhMB8GA1UE\n".
        "CgwYSW50ZXJuZXQgV2lkZ2l0cyBQdHkgTHRkMREwDwYDVQQDDAgzMzkxNTkzNDEq\n".
        "MCgGCSqGSIb3DQEJARYbYW5nZWxvZ2FsYXpodWVydGFAZ21haWwuY29tMB4XDTE5\n".
        "MDUwMzE0MTIwOFoXDTIzMDUwMjE0MTIwOFowgZUxCzAJBgNVBAYTAkNMMREwDwYD\n".
        "VQQIDAhTYW50aWFnbzERMA8GA1UEBwwIU0FOVElBR08xITAfBgNVBAoMGEludGVy\n".
        "bmV0IFdpZGdpdHMgUHR5IEx0ZDERMA8GA1UEAwwIMzM5MTU5MzQxKjAoBgkqhkiG\n".
        "9w0BCQEWG2FuZ2Vsb2dhbGF6aHVlcnRhQGdtYWlsLmNvbTCCASIwDQYJKoZIhvcN\n".
        "AQEBBQADggEPADCCAQoCggEBAOXQOUV6cMAr7tcC4qK8iz24WTTARjKX4oJ9UVmR\n".
        "A1HQzxfd/pZbB54UPxTb/mCc+LChPJlcdkOyg/mM9Q9vwZ3Mi7eIfd2Y9bPscAp7\n".
        "hiuBw3WAAvzX35qmXDoyaSbJiX+gaLY6cDATEBptd2J0R6WumFQ53lwMlp5TaSrh\n".
        "qPlNIX9XXHTd/0em78B//M9X6Dh/y80Go6lGGHXd/nPwrQdGVmemAjHhrRnCgOC0\n".
        "IIpNSnOAzQwZJWQ+aG3yQgLFJPf/uVVUp7/ZqjZIpcCw1aDdThOJKtNlWQNHfa2s\n".
        "vzWTSkIt4fsqhLngz3G7n11Dcwbqe2Ik08+OBhwaF+X6sRcCAwEAATANBgkqhkiG\n".
        "9w0BAQsFAAOCAQEAWUOa6yNH01o4A5MLnCwEef6mEW8p+wxFVfpegYXFJRE0kpIS\n".
        "Mz6ifj31X1Cfu5fWoGI3K7hozbYr0J7IsB5KI80iAxOEt+jVR+YG2OKVS1EDtCeE\n".
        "V5WPbNr9TiPVAr3gH54VLhhhXoPfN2LamLxupm+f+PeVkWOcpj21rV1pZ4ZV9v8c\n".
        "9iUF2LpDnQtaq74oc8m5sHNTTGy/7+/0S9OozWavcV70eWjNoJhmvrmSUzybOD0N\n".
        "vEYAvUPelUWCccTPa0t5Srcax3RLWHQcVdkhz0DMEu8qOXp1FMFsUFrvuuVdSa9u\n".
        "JppSQybxxA9j6MJ4jSzpIVWJzgiqoBsS8eU7pA==\n".
        "-----END CERTIFICATE-----\n"
    );
    $configuration->setWebpayCert(Webpay::defaultCert());

    return $configuration;
}