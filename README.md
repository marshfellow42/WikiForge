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
