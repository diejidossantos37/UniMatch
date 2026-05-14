?php
require_once "../middlewares/auth.php";
?>

<h1>
Bem-vindo,
<?= $_SESSION["nome"] ?>
</h1>

html_content = """<!DOCTYPE html>
<html lang="pt">
<head>
      <meta charset="UTF-8" />
      <title>System - UniMatch</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="bootstrap-5.3.6-dist/bootstrap-5.3.6-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/CSS/style.css">
      <link rel="stylesheet" href="assets/CSS/bootstrap-icons.css">
</head>

<body>

<div class="floating-shapes">
     <div class="shape shape1"></div>
     <div class="shape shape2"></div>
     <div class="shape shape3"></div>
</div>

<div class="container py-4">
  
      <div class="d-flex justify-content-between align-items-center mb-3 section-fade">
          <h2 class="fw-bold">UniMatch <span class="badge bg-primary">IA</span></h2>
          <div class="d-flex gap-2">
              <button class="btn btn-outline-secondary btn-sm" id="btnThemeToggle" title="Alternar Modo Escuro">
                  <i class="bi bi-moon-stars" id="themeIcon"></i>
              </button>
              <button class="btn btn-outline-secondary btn-sm" id="btnLoadProfile">
                  <i class="bi bi-person-down"></i> Carregar Perfil
              </button>
          </div>
    </div>

      <div class="progress mb-4 section-fade" style="height: 8px;">
            <div id="wizardProgress" class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: 20%"></div>
     </div>

           <div id="wizard" class="card shadow-lg border-0 section-fade">
                 <div class="card-body p-4 p-md-5">

           <div class="wizard-step active" data-step="0">
           <div class="d-flex justify-content-between align-items-center mb-3">
           <div>
                <h4 class="mb-1">Explorar Universidades</h4>
                <p class="text-muted mb-0">Navega por todos os cursos antes de começar</p>
         </div>
                <button class="btn btn-primary btn-sm" id="btnPularExplorar">
                Ir direto pro teste <i class="bi bi-arrow-right"></i>
                </button>
        </div>

           <div class="row g-2 mb-3">
                <div class="col-md-4">
                     <input type="text" class="form-control" id="buscaCurso" placeholder="Buscar curso ou universidade...">
        </div>
               <div class="col-md-2">
                    <select class="form-select" id="filtroPaisTabela">
                            <option value="todos">Todos países</option>
                            <option value="AO">Angola</option>
                            <option value="PT">Portugal</option>
                            <option value="BR">Brasil</option>
                    </select>
              </div>

               <div class="col-md-2">
                    <select class="form-select" id="filtroCustoTabela">
                            <option value="todos">Qualquer custo</option>
                            <option value="baixo">Baixo</option>
                            <option value="medio">Médio</option>
                            <option value="alto">Alto</option>
                    </select>
             </div>

                <div class="col-md-2">
                     <select class="form-select" id="filtroAreaTabela">
                             <option value="todos">Todas áreas</option>
                             <option value="engenharia">Engenharia</option>
                             <option value="saude">Saúde</option>
                             <option value="humanas">Humanas</option>
                             <option value="gestao">Gestão</option>
                     </select>
            </div>

                <div class="col-md-2">
                     <select class="form-select" id="ordenarPor">
                             <option value="popular">Mais escolhidos</option>
                             <option value="notaMin">Nota mínima</option>
                             <option value="custo">Custo</option>
                     </select>
           </div>
          </div>

               <div class="table-responsive">
                    <table class="table table-hover align-middle">
                           <thead class="table-light">
                                  <tr>
                                     <th>Curso</th>
                                     <th>Universidade</th>
                                     <th>País/Cidade</th>
                                     <th>Custo</th>
                                     <th>Nota Mín.</th>
                                     <th>Popularidade</th>
                                     <th></th>
                                 </tr>
                           </thead>
                          <tbody id="tabelaCursos"></tbody>
                    </table>
               </div>

              <nav class="d-flex justify-content-between align-items-center">
                   <small class="text-muted" id="infoTabela">Mostrando 0 de 0</small>
                          <ul class="pagination pagination-sm mb-0" id="paginacao"></ul>
             </nav>
            </div>


              <div class="wizard-step " data-step="1">
                   <h4 class="mb-1">1. Teu Perfil Acadêmico</h4>
                   <p class="text-muted mb-4">Responde pra calibrarmos a IA</p>
                   <div class="row g-3">
                        <div class="col-md-6">
                             <label class="form-label">Nota média geral 0-20</label>
                             <input type="range" class="form-range" min="8" max="20" value="14" id="notaGeral">
                             <div class="text-center fw-bold"><span id="notaGeralVal">14</span>/20</div>
                        </div>
                   <div class="col-md-6">
                        <label class="form-label">Nota em Matemática 0-20</label>
                        <input type="range" class="form-range" min="8" max="20" value="13" id="notaMat">
                        <div class="text-center fw-bold"><span id="notaMatVal">13</span>/20</div>
                   </div>
                    <div class="col-12">
                         <label class="form-label">Área de interesse</label>
                         <select class="form-select" id="areaInteresse">
                                 <option value="engenharia">Engenharia e Tecnologia</option>
                                 <option value="saude">Saúde</option>
                                 <option value="humanas">Humanas e Sociais</option>
                                 <option value="gestao">Gestão e Economia</option>
                         </select>
                    </div>
                  </div>
               </div>

               <div class="wizard-step" data-step="2">
                    <h4 class="mb-1">2. Preferências de Universidade</h4>
                    <p class="text-muted mb-4">Filtra pra achar teu match ideal</p>
                    <div class="row g-3">
                          <div class="col-md-4">
                                <label class="form-label">País</label>
                                        <select class="form-select" id="filtroPais">
                                                <option value="todos">Qualquer país</option>
                                                <option value="AO">Angola</option>
                                                <option value="PT">Portugal</option>
                                                <option value="BR">Brasil</option>
                                        </select>
               </div>
                         <div class="col-md-4">
                              <label class="form-label">Cidade</label>
                              <input type="text" class="form-control" id="filtroCidade" placeholder="Luanda, Lisboa...">
                        </div>
                         <div class="col-md-4">
                              <label class="form-label">Custo</label>
                                     <select class="form-select" id="filtroCusto">
                                             <option value="todos">Qualquer</option>
                                             <option value="baixo">Baixo <$2000/ano</option>
                                             <option value="medio">Médio $2000-8000</option>
                                             <option value="alto">Alto >$8000</option>
                                    </select>
                         </div>
                     </div>
                  </div>

                <div class="wizard-step" data-step="3">
                     <h4 class="mb-1">3. Perguntas Rápidas</h4>
                     <p class="text-muted mb-4">A IA ajusta com base nas tuas respostas</p>
                     <div id="dynamicQuestions"></div>
              </div>

                <div class="wizard-step" data-step="4">
                     <h4 class="mb-1">Teu Ranking Personalizado</h4>
                     <p class="text-muted mb-4">Top 3 cursos com % de compatibilidade</p>
        
                     <div id="top3Container" class="row g-3 mb-4"></div>

                     <div class="card mb-4">
                          <div class="card-body">
                               <h6>Compatibilidade por Área</h6>
                                  <canvas id="chartCompat" height="120"></canvas>
                          </div>
                   </div>

                  <div class="d-grid gap-2 d-md-flex mb-3">
                       <button class="btn btn-warning" id="btnSimularMat">
                       <i class="bi bi-graph-up"></i> E se eu melhorar em Matemática?
                       </button>
                       <button class="btn btn-success" id="btnSalvarPerfil">
                       <i class="bi bi-save"></i> Salvar Perfil
                       </button>
                 </div>

                <div id="explicacaoIA" class="alert alert-info section-fade"></div>
        
                      <h6 class="mt-4">Todos os resultados filtrados</h6>
                      <div id="rankingCompleto" class="list-group"></div>
                </div>

               <div class="d-flex justify-content-between mt-5">
                    <button class="btn btn-outline-secondary" id="btnPrev" disabled>Voltar</button>
                    <button class="btn btn-primary" id="btnNext">Próximo <i class="bi bi-arrow-right"></i></button>
               </div>

           </div>
        </div>
    </div>
                            
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                     <div id="toastFeedback" class="toast" role="alert">
                          <div class="toast-header">
                               <strong class="me-auto">UniMatch IA</strong>
                               <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
               </div>
                     <div class="toast-body" id="toastMsg">Perfil salvo!</div>
                  </div>
              </div>

                <div class="modal fade" id="modalCurso" tabindex="-1">
                     <div class="modal-dialog modal-dialog-scrollable">
                          <div class="modal-content">
                               <div class="modal-header">
                                    <h5 class="modal-title" id="modalCursoTitulo">Detalhes de Curso</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                               </div>
                                <div class="modal-body">
                                     <div class="row g-3 mb-3">
                                          <div class="col-md-6">
                                               <div class="card h-100">
                                                    <div class="card-body">
                                                         <h6 class="text-muted">Universidade</h6>
                                                             <p class="mb-1 fw-bold" id="modalUni"></p>
                                                             <p class="mb-0 small" id="modalLocal"></p>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                      <div class="card h-100">
                                                           <div class="card-body">
                                                                <h6 class="text-muted">Dados do Curso</h6>
                                                                <p class="mb-1">Duração: <span id="modalDuracao"></span>anos</p>
                                                                <p class="mb-1">Propina: Kz<span id="modalPropina"></span>/ano</p>
                                                                <p class="mb-0">Nota minima: <span id="modalNotaMin"></span>/20</p>
                                                           </div>
                                                      </div>
                                                </div>
                                          </div>
                <h6>Nota de corte - Últimos 3 Anos</h6>
                <canvas id="chartNotaCorte" height="100" class="mb-4"></canvas>

                <h6>Grade Curricular Resumida</h6>
                <div class="accordion" id="accordionGrade"></div>

                <div class="d-grid mt-3">
                     <button class="btn btn-primary btn-auto" id="btnSimularEsteCurso">
                     <i class="bi bi-stars"></i> Simular
                     </button>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<script src="bootstrap-5.3.6-dist/bootstrap-5.3.6-dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/data.js"></script>
<script src="assets/js/ai-engine.js"></script>
<script src="assets/js/app.js"></script>

<script>
    // Script do Modo Escuro integrado diretamente aqui para garantir execução imediata
    const btnThemeToggle = document.getElementById('btnThemeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const htmlElement = document.documentElement;

    const savedTheme = localStorage.getItem('theme') || 'light';
    htmlElement.setAttribute('data-bs-theme', savedTheme);
    updateIcon(savedTheme);

    btnThemeToggle.addEventListener('click', () => {
        const currentTheme = htmlElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        
        htmlElement.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateIcon(newTheme);
    });

    function updateIcon(theme) {
        if (theme === 'dark') {
            themeIcon.classList.replace('bi-moon-stars', 'bi-sun');
        } else {
            themeIcon.classList.replace('bi-sun', 'bi-moon-stars');
        }
    }
</script>

</body>
</html>"""

with open("index_v2.html", "w", encoding="utf-8") as f:
    f.write(html_content)

