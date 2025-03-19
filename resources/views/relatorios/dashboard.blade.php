@extends('layouts.app')

@section('content')

    <h2 class="my-4">Painel de Gestão AEE</h2>
        
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm bg-primary text-white text-center p-3">
                <h5>Alunos Atendidos</h5>
                <h3>{{$alunos}}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm bg-success text-white text-center p-3">
                <h5>PDIs Criados</h5>
                <h3>{{$pdis_criados}}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm bg-warning text-dark text-center p-3">
                <h5>PDIs Concluídos</h5>
                <h3>{{$pdis_concluidos}}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm bg-danger text-white text-center p-3">
                <h5>Alunos sem PDI</h5>
                <h3>{{$pdis_criados - $pdis_concluidos}}</h3>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h2>📌 Relatório de Alunos e CID</h2>

        <div class="row my-3">
            <label class="form-label">Filtrar por:</label>
            <div class="col-md-4">
                <label for="gre_id" class="form-label">GRE</label>
                <select class="form-select" id="gre_id">
                    <option value="" selected disabled>Selecione a GRE</option>
                    @foreach ($gres as $gre)
                        <option value="{{$gre->id}}">{{$gre->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="municipio_id" class="form-label">Município</label>
                <select class="form-select" id="municipio_id">
                      <option value="" selected disabled>Selecione o Município</option>
                    @foreach ($municipios as $municipio)
                        <option value="{{$municipio->id}}">{{$municipio->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="escola_id" class="form-label">Escola</label>
                <select class="form-select" id="escola_id">
                      <option value="" selected disabled>Selecione a Escola</option>
                    @foreach ($escolas as $escola)
                        <option value="{{$escola->nome}}">{{$escola->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="ms-sm-auto px-md-4">
            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <h5 class="card-title">Quantidade de alunos por deficiência</h5>
                    <canvas id="graficoAlunos"></canvas>
                </div>
            </div>
        
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Últimos PDIs Criados</h5>
                            <ul class="list-group">
                                <li class="list-group-item">📄 João Silva - Transtorno do Espectro Autista</li>
                                <li class="list-group-item">📄 Maria Oliveira - Deficiência Auditiva</li>
                                <li class="list-group-item">📄 Lucas Santos - Deficiência Intelectual</li>
                            </ul>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Últimos Atendimentos Registrados</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Aluno</th>
                                        <th>Data</th>
                                        <th>Especialista</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ana Souza</td>
                                        <td>12/03/2025</td>
                                        <td>Psicopedagoga</td>
                                    </tr>
                                    <tr>
                                        <td>Felipe Costa</td>
                                        <td>10/03/2025</td>
                                        <td>Fonoaudióloga</td>
                                    </tr>
                                    <tr>
                                        <td>Carla Mendes</td>
                                        <td>08/03/2025</td>
                                        <td>Professor AEE</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        
            </div>
        
        </div>
             
        
           
        
        
        
        @push('scripts')
        <script>
            var ctx = document.getElementById('graficoAlunos').getContext('2d');
            var graficoAlunos = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Autismo', 'Deficiência Visual', 'Deficiência Auditiva', 'Deficiência Intelectual', 'Altas Habilidades'],
                    datasets: [{
                        label: 'Número de Alunos',
                        data: [25, 10, 8, 15, 7],
                        backgroundColor: ['blue', 'green', 'yellow', 'red', 'purple']
                    }]
                }
            });

        document.addEventListener("DOMContentLoaded", function() {
            const filtro = document.getElementById("filtro");
            const selecao = document.getElementById("selecao");
            const totalAlunos = document.getElementById("totalAlunos");
            const totalCID = document.getElementById("totalCID");
            const tabelaDados = document.getElementById("tabelaDados");
            let chartInstance = null;

            // Dados simulados
            const dados = {
                escola: {
                    "Escola A": { alunos: 100, cid: {"F84": 30, "H90": 20, "G40": 50} },
                    "Escola B": { alunos: 120, cid: {"F84": 40, "H90": 30, "G40": 50} }
                },
                gre: {
                    "GRE 1": { alunos: 200, cid: {"F84": 80, "H90": 60, "G40": 60} },
                    "GRE 2": { alunos: 180, cid: {"F84": 70, "H90": 50, "G40": 60} }
                },
                municipio: {
                    "Município X": { alunos: 300, cid: {"F84": 100, "H90": 100, "G40": 100} },
                    "Município Y": { alunos: 250, cid: {"F84": 90, "H90": 80, "G40": 80} }
                }
            };

            function carregarOpcoes(tipo) {
                selecao.innerHTML = "";
                Object.keys(dados[tipo]).forEach((key) => {
                    const option = document.createElement("option");
                    option.value = key;
                    option.textContent = key;
                    selecao.appendChild(option);
                });
                atualizarDados();
            }

            function atualizarDados() {
                const tipo = filtro.value;
                const selecionado = selecao.value;
                if (!dados[tipo] || !dados[tipo][selecionado]) return;

                // Atualiza os números
                totalAlunos.textContent = dados[tipo][selecionado].alunos;
                totalCID.textContent = Object.keys(dados[tipo][selecionado].cid).length;

                // Atualiza o gráfico
                atualizarGrafico(dados[tipo][selecionado].cid);

                // Atualiza a tabela
                tabelaDados.innerHTML = "";
                Object.entries(dados[tipo][selecionado].cid).forEach(([cid, qtd]) => {
                    const row = `<tr><td>${cid}</td><td>${selecionado}</td><td>${qtd}</td></tr>`;
                    tabelaDados.innerHTML += row;
                });
            }

            function atualizarGrafico(cidData) {
                const ctx = document.getElementById("graficoCID").getContext("2d");
                if (chartInstance) chartInstance.destroy();
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: Object.keys(cidData),
                        datasets: [{
                            label: "Quantidade de Alunos",
                            data: Object.values(cidData),
                            backgroundColor: ["blue", "green", "red"]
                        }]
                    }
                });
            }

            filtro.addEventListener("change", () => carregarOpcoes(filtro.value));
            selecao.addEventListener("change", atualizarDados);

            carregarOpcoes("escola");
        });
    </script>

@endpush
@endsection
