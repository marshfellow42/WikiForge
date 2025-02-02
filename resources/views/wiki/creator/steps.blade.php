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