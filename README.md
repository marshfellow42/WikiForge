# WikiForge

Nosso template de wiki

## Prerrequisitos para rodar o website

Antes de tudo, confira se você tem o PHP, Composer e o Laravel em si instalado

Execute esse comando no `Powershell (como Administrador)`
```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```

Depois de ter o PHP, Composer e o Laravel instalado na sua máquina, você abre o `Git Bash`

Depois você roda o comando abaixo para fazer todo o setup do website na sua máquina
```bash
./setup.sh
```

Por fim, para executar o website, é só usar o comando abaixo
```bash
composer run dev
```

---

**Observação:** Caso não esteja conseguindo rodar o website pelo `Powershell` ou pelo `CMD`, por conta de não estar achando nenhuma porta no Localhost, mas consegue rodar pelo `Git Bash`. O problema está na sua configuração do `php.ini`

O erro talvez seja parecido com isso

```
[vite]   ➜  APP_URL: http://localhost
[server]   Failed to listen on 127.0.0.1:8001 (reason: ?)
[server]   Failed to listen on 127.0.0.1:8002 (reason: ?)
[server]   Failed to listen on 127.0.0.1:8003 (reason: ?)
[server]   Failed to listen on 127.0.0.1:8004 (reason: ?)
[server]   Failed to listen on 127.0.0.1:8005 (reason: ?)
[server]   Failed to listen on 127.0.0.1:8006 (reason: ?)
[server]   Failed to listen on 127.0.0.1:8007 (reason: ?)
[server]   Failed to listen on 127.0.0.1:8008 (reason: ?)
[server]   Failed to listen on 127.0.0.1:8009 (reason: ?)
[server]   Failed to listen on 127.0.0.1:8010 (reason: ?)
[server] php artisan serve exited with code 1
```

Digite o comando abaixo para encontrar o arquivo `.ini` utilizado pela sua máquina

```powershell
php --ini
```

Você vai conseguir uma lista com essas 3 listas

```
Loaded Configuration File:         <Seu Diretório>\php.ini
Scan for additional .ini files in: (none)
Additional .ini files parsed:      (none)
```

Entre no diretório utilizado, e procure por esse texto

```ini
variables_order = "EGPCS"
```

Troque o nome da variável pelo texto abaixo

```ini
variables_order = "GPCS"
```

Pronto, agora o website deve rodar normalmente pelos terminais do Windows
