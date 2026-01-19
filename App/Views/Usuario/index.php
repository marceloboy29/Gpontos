<!DOCTYPE html>
<html lang="pt-BR">
<style>
    .frame {
        position: fixed;
        top: 0px;
        width: 100%;
        height: 100vh;
        color: #415868;
        font-family: 'Open Sans', Helvetica, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        z-index: 99;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.4);
    }

    .modal {
        position: relative;
        width: 280px;
        height: 210px;
        background: #3a4653;
        color: #fdfdfd;
        border-radius: 3px;
        box-shadow: 4px 8px 12px 0 rgba(0, 0, 0, 0.4);
        text-align: center;
        overflow: hidden;
        animation: show-modal .7s ease-in-out;

        &.hide {
            animation: hide-modal .6s ease-in-out both;
        }

        img {
            margin-top: 24px;
        }

        .title {
            display: block;
            font-size: 18px;
            line-height: 24px;
            font-weight: 400;
            margin: 14px 0 5px 0;
        }

        p {
            font-size: 14px;
            font-weight: 300;
            line-height: 19px;
            margin: 0;
            padding: 0 30px;
        }

        .button {
            position: absolute;
            height: 40px;
            bottom: 0;
            left: 0;
            right: 0;
            /* background: #F65656; */
            background: #51cba2;
            color: #fff;
            line-height: 40px;
            font-size: 14px;
            font-weight: 400;
            cursor: pointer;
            transition: background .3s ease-in-out;

            &:hover {
                background: #EC3434;
            }

        }

    }

    @keyframes show-modal {
        0% {
            transform: scale(0);
        }

        60% {
            transform: scale(1.1);
        }

        80% {
            transform: scale(.95);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes hide-modal {
        0% {
            transform: scale(1);
        }

        20% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(0);
        }
    }

    .loader_pai {
        position: fixed;
        top: 0px;
        width: 100%;
        height: 100vh;
        background: #121721;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99;
        flex-direction: column;
    }

    .loader_pai label {
        margin-top: 10px;
        font-weight: bold;
        color: #757575;
    }

    /* HTML: <div class="loader"></div> */
    .loader {
        width: 60px;
        aspect-ratio: 1;
        color: #d5740d;
        border: 10px solid;
        box-sizing: border-box;
        border-radius: 50%;
        animation: l6 2s infinite linear;
        position: relative;
    }

    .loader:before {
        content: "";
        position: absolute;
        height: 20px;
        inset: auto calc(50% - 10px) 100%;
        border-radius: 5px 5px 0 0;
        background: linear-gradient(rgb(65 82 129) 0 0) top / 100% 30%,
            linear-gradient(rgb(59 167 166) 0 0) top / 50% 100%;
        background-repeat: no-repeat;
    }

    .loader:after {
        content: "";
        position: absolute;
        inset: -8px -10px auto;
        height: 15px;
        background: radial-gradient(farthest-side, rgb(123 33 179) 94%, #0000) left,
            radial-gradient(farthest-side, rgb(115 37 163) 94%, #0000) right;
        background-size: 15px 15px;
        background-repeat: no-repeat;
    }

    @keyframes l6 {
        0% {
            background: conic-gradient(#77a4bd 0, #0000 0)
        }

        12.5% {
            background: conic-gradient(#77a4bd 45deg, #0000 46deg)
        }

        25% {
            background: conic-gradient(#77a4bd 90deg, #0000 91deg)
        }

        37.5% {
            background: conic-gradient(#77a4bd 135deg, #0000 136deg)
        }

        50% {
            background: conic-gradient(#77a4bd 180deg, #0000 181deg)
        }

        62.5% {
            background: conic-gradient(#77a4bd 225deg, #0000 226deg)
        }

        75% {
            background: conic-gradient(#77a4bd 270deg, #0000 271deg)
        }

        87.5% {
            background: conic-gradient(#77a4bd 315deg, #0000 316deg)
        }

        100% {
            background: conic-gradient(#77a4bd 360deg, #0000 360deg)
        }
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPonto - Relógio de Ponto Moderno</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= $dados['base_url'] ?>/public/css/style.css">
</head>

<body>
    <div class="app-container">
        <!-- Sidebar Navigation -->
        <nav class="sidebar">
            <div class="logo">
                <i class="fa-solid fa-clock"></i>
                <span>GPonto</span>
            </div>
            <ul class="nav-links">
                <li class="active">
                    <a href="#"><i class="fa-solid fa-house"></i> <span>Início</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-calendar-days"></i> <span>Histórico</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-chart-pie"></i> <span>Relatórios</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-users"></i> <span>Equipe</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-gear"></i> <span>Configurações</span></a>
                </li>
            </ul>
            <div class="user-profile">
                <div class="avatar">
                    <img src="https://ui-avatars.com/api/?name=Usuario+Teste&background=6366f1&color=fff" alt="User">
                </div>
                <div class="user-info">
                    <p class="name"><?= isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'nn' ?></p>
                    <!-- <p class="role"></p> -->
                </div>
                <button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i></button>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-bar">
                <div class="welcome-text">
                    <h1>Olá, <?= isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'nn' ?>! 👋</h1>
                    <p>Pronto para mais um dia produtivo?</p>
                </div>
                <div class="date-display">
                    <i class="fa-regular fa-calendar"></i>
                    <span id="current-date">Sexta, 16 de Janeiro de 2026</span>
                </div>
            </header>

            <div class="dashboard-grid">
                <!-- Clock Section -->
                <section class="clock-card glass-panel">
                    <div class="clock-display">
                        <span class="time" id="clock-time">11:20:17</span>
                        <!-- <span class="meridiem">AM</span> -->
                    </div>
                    <?php if ($dados['dados']['entrada'] != '00:00'): ?>
                        <div class="status-badge online">
                            <span class="dot"></span>
                            Status: Online
                        </div>

                    <?php elseif ($dados['dados']['saida'] == '00:00'): ?>
                        <div class="status-badge offline">
                            <span class="dot"></span>
                            Status: Off-line
                        </div>

                    <?php elseif ($dados['dados']['retorno'] != '00:00'): ?>
                        <div class="status-badge online">
                            <span class="dot"></span>
                            Status: Online
                        </div>

                    <?php endif; ?>


                    <div class="action-buttons">
                        <?php
                        $opcao = $dados['dados']['entrada'] == '00:00' ? 'null' : 'Entra';
                        $opcao = $dados['dados']['saida'] == '00:00' ? 'null' : 'Saida';
                        $opcao = $dados['dados']['retorno'] == '00:00' ? 'null' : 'Retorno';
                        $opcao = $dados['dados']['fim'] == '00:00' ? 'null' : 'Finalizado';
                        ?>
                        <button class="btn btn-primary btn-large" onclick="CreatePonto('<?= $opcao ?>')">
                            <div class="icon-wrapper">
                                <i class="fa-solid fa-fingerprint"></i>
                            </div>
                            <div class="btn-text">
                                <span class="action">Registrar Ponto</span>
                                <!-- <span class="sub-text"></span> -->
                            </div>
                        </button>
                    </div>

                    <div class="quick-stats">
                        <div class="stat-item">
                            <span class="label">Entrada</span>
                            <span class="value"><?= $dados['dados']['entrada'] ?></span>
                        </div>
                        <div class="divider"></div>
                        <div class="stat-item">
                            <span class="label">Saída Prevista</span>
                            <span class="value"><?= $dados['dados']['previa'] ?></span>
                        </div>
                        <div class="divider"></div>
                        <div class="stat-item">
                            <span class="label">Saldo</span>
                            <span class="value positive">+<?= substr($dados['dados']['total_horas'], 0, 5) ?></span>
                        </div>
                    </div>
                </section>

                <!-- Recent Activity Timeline -->
                <section class="activity-card glass-panel">
                    <div class="card-header">
                        <h2>Atividade Recente</h2>
                        <button class="icon-btn"><i class="fa-solid fa-ellipsis"></i></button>
                    </div>
                    <div class="timeline">
                        <div class="timeline-item <?= $dados['dados']['entrada'] == '00:00' ? 'future' : '' ?>">
                            <div class="timeline-icon <?= $dados['dados']['entrada'] != '00:00' ? 'start' : 'check' ?>">
                                <i class="fa-solid fa-<?= $dados['dados']['entrada'] != '00:00' ? 'check' : 'circle' ?>"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="time"><?= $dados['dados']['entrada'] != '00:00' ? $dados['dados']['entrada'] : '--:--' ?></p>
                                <p class="desc">Entrada</p>
                            </div>
                        </div>

                        <div class="timeline-item <?= $dados['dados']['saida'] == '00:00' ? 'future' : '' ?>">
                            <div class="timeline-icon <?= $dados['dados']['saida'] != '00:00' ? 'break' : 'check' ?>">
                                <i class="fa-solid fa-<?= $dados['dados']['saida'] != '00:00' ? 'burger' : 'circle' ?>"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="time"><?= $dados['dados']['saida'] != '00:00' ? $dados['dados']['saida'] : '--:--' ?></p>
                                <p class="desc">Saida Intervalo</p>
                            </div>
                        </div>

                        <div class="timeline-item <?= $dados['dados']['retorno'] == '00:00' ? 'future' : '' ?>">
                            <div class="timeline-icon <?= $dados['dados']['retorno'] != '00:00' ? 'start' : 'check' ?>">
                                <i class="fa-solid fa-<?= $dados['dados']['retorno'] != '00:00' ? 'check' : 'circle' ?>"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="time"><?= $dados['dados']['saida'] != '00:00' ? $dados['dados']['retorno'] : '--:--' ?></p>
                                <p class="desc">Retorno</p>
                            </div>
                        </div>

                        <div class="timeline-item <?= $dados['dados']['fim'] == '00:00' ? 'future' : '' ?>">
                            <div class="timeline-icon <?= $dados['dados']['fim'] != '00:00' ? 'start' : 'check' ?>">
                                <i class="fa-solid fa-<?= $dados['dados']['fim'] != '00:00' ? 'check' : 'circle' ?>"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="time"><?= $dados['dados']['saida'] != '00:00' ? $dados['dados']['fim'] : '--:--' ?></p>
                                <p class="desc">Finalizado</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <div class="frame" style="display: none;">
        <div class="modal">
            <img src="https://100dayscss.com/codepen/alert.png" width="44" height="38" />
            <span class="title">ATENÇÃO!</span>
            <p>Erro ao obter localização</p>
            <div class="button" onclick="ModalErroLocalizao()">Dismiss</div>
        </div>
    </div>

    <div class="frame" style="display: none;" id="modal_erro">
        <div class="modal">
            <img src="https://100dayscss.com/codepen/alert.png" width="44" height="38" />
            <span class="title">ERRO!</span>
            <p>Resistro nao Foi salvo!!</p>
            <div class="button" onclick="ModalErroLocalizao()">Tenta Novamente!</div>
        </div>
    </div>

    <div class="loader_pai" style="display: none;">
        <div class="loader"></div>
        <label for="">Agurde...</label>
    </div>

    <!-- Simple JS just for the clock ticking effect if user wants to see it 'alive' - keeping it inline or simple -->
    <script>
        async function ModalErroLocalizao() {
            document.querySelector('.modal').classList.add('hide');
            setTimeout(() => {
                document.querySelector('.frame').style.display = 'none';
            }, 700);
            await pegarLocalizacao();
        }

        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('pt-BR', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('clock-time').textContent = timeString;

            // Date
            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            document.getElementById('current-date').textContent = now.toLocaleDateString('pt-BR', dateOptions);
        }
        setInterval(updateClock, 1000);
        updateClock();

        let latitude = 0;
        let longitude = 0;

        async function CreatePonto(param) {
            if (param == 'nullsss') {
                alert()
                exit;
            }

            document.querySelector('.loader_pai').style.display = 'flex'

            try {
                await pegarLocalizacao();

                if (latitude && longitude) {
                    SendPonto();
                    // e.target.querySelector('.loader').style.display = 'none';
                }
            } catch {
                document.querySelector('.frame').style.display = 'flex';
            }
        }

        function pegarLocalizacao() {
            return new Promise((resolve, reject) => {
                if (!("geolocation" in navigator)) {
                    reject(false);
                    return;
                }

                navigator.geolocation.getCurrentPosition(
                    (posicao) => {
                        latitude = posicao.coords.latitude;
                        longitude = posicao.coords.longitude;
                        resolve(true);
                    },
                    (erro) => {
                        reject(false);
                    }
                );
            });
        }

        async function SendPonto() {
            try {
                const response = await fetch("usuario/create", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        latitude: latitude,
                        longitude: longitude
                    })
                });

                const resultado = await response.json();
                if (resultado.status == 'success') {
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else if(resultado.status == 'erro') {
                    setTimeout(() => {
                        document.querySelector('.loader_pai').style.display = 'none'
                        document.getElementById("modal_erro").style.display = 'flex';
                    }, 2000);
                }

            } catch (erro) {
                console.error(erro);
            }
        }
    </script>
</body>

</html>