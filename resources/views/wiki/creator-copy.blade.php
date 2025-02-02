{{---[

parte do site pra fazer a parte de criação de uma wiki


coisas importantes para notar:
teremos topicos de uma wiki, e o usuario pode escolher quantos topicos ele quiser criar;
cada topico redirecionará para uma parte especifica da wiki.
e o usuario escolhera o nome do topico que aparecera na url, sem poder repetir nomes.

exemplo: Wiki - GTA SA
topico 1 - Sobre o CJ - nome url: cj
topico 2 - sobre a lore do jogo - nome url: jogo

dentro do topico 1 por exemplo, vao ter posts sobre o CJ e coisas relacionadas.
o usuario entrou dentro do post 1 por exemplo para mais informaçoes, e o post 1 é sobre Porque o cj abandonou a gangue?

estrutura do site de wiki's:

/wiki/{nome da wiki}/{topico 1}/{post 1}

/wiki/gtasa/cj/post1


---}}

@extends('layouts.main')
@section('title', 'Criador')
@section('content')

<div class="container mt-5">
    <!-- Etapa 01 -->
    <div id="step-1">
        <h3>Formulário de Criação</h3>
        <p>O grande atrativo do site é a possibilidade de criar suas próprias wikis.</p>
        <form>
            <div class="mb-3">
                <label for="wikiName" class="form-label">Nome da Wiki</label>
                <input type="text" class="form-control" id="wikiName" placeholder="ex: Minha Wiki">
            </div>
            <div class="mb-3">
                <label for="wikiDescription" class="form-label">Descrição</label>
                <textarea class="form-control" id="wikiDescription" rows="3" placeholder="alguma descrição..."></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="showStep(2)">Próximo</button>
        </form>
    </div>

    <!-- Etapa 02 -->
    <div id="step-2" class="d-none">
        <h4>Adicione os Tópicos</h4>
        <div id="topicsContainer">
            <!-- Tópicos dinâmicos serão adicionados aqui -->
        </div>
        <button type="button" class="btn btn-secondary me-2" onclick="showStep(1)">Voltar</button>
        <button type="button" class="btn btn-success me-2" onclick="addTopic()">Adicionar Tópico</button>
        <button type="button" class="btn btn-primary" onclick="showStep(3)">Próximo</button>
    </div>

    <!-- Etapa 03 -->
    <div id="step-3" class="d-none">
        <h4>Personalize sua wiki!</h4>
        <p>Finalize os detalhes da sua wiki agora.</p>
        <button type="button" class="btn btn-secondary me-2" onclick="showStep(2)">Voltar</button>
        <button type="button" class="btn btn-primary" onclick="finalizeWiki()">Finalizar</button>
    </div>
</div>

<!-- Script para trocar etapas e adicionar tópicos dinamicamente -->
<script>
    let topicCount = 0; // Contador global para ID único
    const topicsContainer = document.getElementById('topicsContainer');

    function showStep(step) {
        // Oculta todas as etapas
        document.querySelectorAll('[id^="step-"]').forEach(el => el.classList.add('d-none'));
        // Mostra a etapa selecionada
        document.getElementById(`step-${step}`).classList.remove('d-none');
    }

    function addTopic() {
        topicCount++;
        const topicDiv = document.createElement('div');
        topicDiv.className = 'mb-3';
        topicDiv.setAttribute('data-topic-id', topicCount); // Atribui um identificador exclusivo
        topicDiv.innerHTML = `
        <label class="form-label">Tópico <span class="topic-number">${getCurrentTopicCount() + 1}</span></label>
        <input type="text" class="mb-2 form-control" placeholder="Nome do Tópico">
        <input type="text" class="form-control" placeholder="URL do Tópico">
        <button type="button" class="mt-2 btn btn-danger" onclick="removeTopic(${topicCount})">Remover Tópico</button>
    `;
        topicsContainer.appendChild(topicDiv);
        updateTopicNumbers();
    }

    function removeTopic(id) {
        const topicDiv = document.querySelector(`[data-topic-id="${id}"]`);
        if (topicDiv) {
            topicsContainer.removeChild(topicDiv);
            updateTopicNumbers();
        }
    }

    function updateTopicNumbers() {
        // Atualiza a numeração dos tópicos com base na ordem atual
        const topics = topicsContainer.querySelectorAll('[data-topic-id]');
        topics.forEach((topic, index) => {
            const numberSpan = topic.querySelector('.topic-number');
            if (numberSpan) {
                numberSpan.textContent = index + 1;
            }
        });
    }

    function getCurrentTopicCount() {
        // Retorna o número de tópicos atualmente no container
        return topicsContainer.querySelectorAll('[data-topic-id]').length;
    }

    function finalizeWiki() {
        const wikiName = document.getElementById('wikiName').value;
        const wikiDescription = document.getElementById('wikiDescription').value;

        const topics = [];
        topicsContainer.querySelectorAll('[data-topic-id]').forEach((topic, index) => {
            const inputs = topic.querySelectorAll('input');
            topics.push({
                name: inputs[0].value, // Nome do tópico
                url: inputs[1].value // URL do tópico
            });
        });

        console.log({
            wikiName,
            wikiDescription,
            topics
        });

        alert('Wiki finalizada! Confira o console para ver os detalhes.');
    }
</script>

@endsection