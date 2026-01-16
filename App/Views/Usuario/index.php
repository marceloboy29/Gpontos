<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPonto - Relógio de Ponto Moderno</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>/public/css/style.css">
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
                    <p class="name">João Silva</p>
                    <p class="role">Desenvolvedor</p>
                </div>
                <button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i></button>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-bar">
                <div class="welcome-text">
                    <h1>Olá, João! 👋</h1>
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
                    <div class="status-badge online">
                        <span class="dot"></span>
                        Status: Em Trabalho
                    </div>
                    
                    <div class="action-buttons">
                        <button class="btn btn-primary btn-large">
                            <div class="icon-wrapper">
                                <i class="fa-solid fa-fingerprint"></i>
                            </div>
                            <div class="btn-text">
                                <span class="action">Registrar Ponto</span>
                                <span class="sub-text">Entrada/Saída</span>
                            </div>
                        </button>
                    </div>

                    <div class="quick-stats">
                        <div class="stat-item">
                            <span class="label">Entrada</span>
                            <span class="value">08:00</span>
                        </div>
                        <div class="divider"></div>
                        <div class="stat-item">
                            <span class="label">Saída Prevista</span>
                            <span class="value">17:00</span>
                        </div>
                        <div class="divider"></div>
                        <div class="stat-item">
                            <span class="label">Saldo</span>
                            <span class="value positive">+00:15</span>
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
                        <div class="timeline-item">
                            <div class="timeline-icon start">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="time">08:00</p>
                                <p class="desc">Entrada</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon break">
                                <i class="fa-solid fa-mug-hot"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="time">12:00</p>
                                <p class="desc">Início do Almoço</p>
                            </div>
                        </div>
                        <div class="timeline-item future">
                            <div class="timeline-icon">
                                <i class="fa-solid fa-circle"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="time">--:--</p>
                                <p class="desc">Fim do Almoço</p>
                            </div>
                        </div>
                        <div class="timeline-item future">
                            <div class="timeline-icon">
                                <i class="fa-solid fa-circle"></i>
                            </div>
                            <div class="timeline-content">
                                <p class="time">--:--</p>
                                <p class="desc">Saída</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
    
    <!-- Simple JS just for the clock ticking effect if user wants to see it 'alive' - keeping it inline or simple -->
    <script>
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('pt-BR', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            document.getElementById('clock-time').textContent = timeString;
            
            // Date
            const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('current-date').textContent = now.toLocaleDateString('pt-BR', dateOptions);
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>
