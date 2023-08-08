let selectTurma = document.getElementById('turmas');

selectTurma.onchange = () => {
let selectAluno = document.getElementById('alu');
let valor = selectTurma.value;


fetch("alu_turmas.php?alu_turmas=" + valor)

    .then(response => {
    return response.text();

}). then(texto => {
    selectAluno.innerHTML = texto;
});


}