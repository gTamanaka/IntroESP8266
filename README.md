# Introdução a Programação com NodeMCU

## Uma pequena introdução

O GitHub é um site utilizado por diversos programadores ao redor do mundo para compartilhar os códigos por eles criados. Muitas pessoas participam da comunidade *Open Sourece* e disponibilizam gratuitamente o contéudo criado sem nenhum custo.

Para utilizar o contéudo aqui presente **não** é necessário criar uma conta, continue seguindo as explicações e mais adiante todas as informações necessárias para a utilização estarão apresentadas.

Um repositório é uma página de um projeto de algum programador, o grande botão verde a direita na parte superior permite *clonar* ou baixar como zip o contéudo aqui presente. Caso saiba o que é *clonar* sinta-se livre para usar, caso contrário apenas realize o *download* do contéudo

### Entendo esse repositório

Esse texto e todo o código que serão utilizados estão apresentandos aqui nesse repostório. Além desse arquivo principal da página, existem os arquivos de exemplo presentes na pasta examples.

## Instruções de instalação

Essa seção conterá uma explicação simples de como instalar os programas que serão necessários para serem utilizado na aula.

### Instalando o Atom

O primeiro passo a ser executado é realizar o *download* do Atom IDE.

Para realizar o *download* basta acessar o link https://atom.io/ e clicar na opção **Download**, após isso basta abrir o arquivo de instalação e seguir as opções de instalação.

### Instalando o PlatformIO no Atom

Após a instalação do Atom, realizaremos a instalação do PlatformIO. O PlatformIO, ou simplesmente PIO, é um pacote disponível para o Atom e que facilita realizar desenvolvimento com placas de desenvolvimento, como por exemplo o NodeMCU utilizado nessa atividade.

Com o Atom aberto, nas opções superiores clique em **File** seguido de **Settings**

%% Inserir figura

Clique na opção **Install** e no campo de pesquisa escreva *PlatformIO*, aparecerão os pacotes disponíveis, instale a opção **platformio-ide**. Todo o processo levará um tempo considerável.

%% Outra Image

Depois do Atom ser reabaerto, provavelmente você verá uma barra lateral extra mais a esquerda, caso não apareceça clique na opção **View** e depois em **Toggle Toolbar**.

%% Outra imagem

Clique no primeiro icone da barra, o **PlatformIO Home**, uma nova aba no programa se abrirá. Nessa nova aba clique no **New Project**

%% Outra imagem

Preencha no campo **Name** o nome do seu projeto, no campo **Board** escolha NodeMCU 0.9 e finalmente no campo **Framework** escolha Arduino. Clique em **Finish** e aguarde um pouco.

## Entendo a estutura de um projeto

Um projeto é basicamente contituído por duas pastas e 3 arquivos, todos os 5 são criados automaticamente pelo PlatformIO.

- Pasta **lib**: Nessa pasta estão contidos códigos produzidos por terceiros e que serão utilizados no código principal. Esses códigos são chamados de **bibliotecas** ou **librarys**
- Pasta **src**: Nessa pasta está contido o main.cpp, o arquivo principal do programa, nele será incluido as bibliotecas e o código propriamente dito.
- Os outros três são arquivos de configurações que por enquanto não são importantes.

### Uma brevissima explicação sobre o C++

A programação de um NodeMCU envolve a  liguagem de programação C++. Existem muitos contéudos para serem dominados a se programar em C++, mas para manter a simplicidade aqui presente, serão apresentadas somentes as a serem utilizadas.

C++ segue a seguinte extrutura básica para variavéis, primeiro declara-se o tipo da variável e sem seguinte o nome que ela terá. Opcionalmente será declarado o valor da mesma.

```c++
    tipo nome = valor
    int numero-de-lampadas = 3
    char nome = "Projeto1"
```

As funções em C++ são semelhantes as variáveis possuindo nome e tipo, porém as mesmas podem ou não receber parâmetros. Finalmente uma função precisa realizar alguma operação, essa operação é descrita dentro dos { }. **Nota:** funções são bem complexas, mas nessa atividade utilizaremos apenas as do tipo *void*, essas não recebem nenhum parâmetro.

```c++
    tipo nome(parametos){
        realizar isso;
    }

    int somarDoisNumeros(int x, int y){
        return x+y;
    }
```

Finalmente a ultima parte a ser explicado nessa primeira explicação é o **#include**. As bibliotecas presentes na pasta **lib** precisam ser importadas para o arquivo principal, para isso é o utilizado o **#include**, a *syntax* é bem simple é o #include seguido do nome_da_biblioeca.h entre < >.

```c++
    #include <Biblioteca.h>
```

### O main.cpp

O main.cpp é um arquivo gerado pelo PIO e utiliza a linguagem C++ (**C** **P**lus **P**lus). Esse arquivo também possui duas funções que dividem o programa. A função *void setup()* é executada apenas uma vez por programa e a função *void loop()* é executada em *loop*, ou seja repetidamente, pelo programa. 