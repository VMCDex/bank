@extends('layouts.app')
@section('content')
<style>
.about-bank {
  padding: 60px 0;
  background-color: #f8f9fa;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.page-header {
  text-align: center;
  margin-bottom: 50px;
}

.page-header h1 {
  font-size: 2.5rem;
  color: #333;
  margin-bottom: 15px;
}

.page-header p {
  font-size: 1.2rem;
  color: #666;
  max-width: 700px;
  margin: 0 auto;
}

/* Основной блок */
.bank-overview {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  margin-bottom: 60px;
  align-items: start;
}

.overview-text h2 {
  color: #2c3e50;
  margin-bottom: 20px;
}

.values-list {
  list-style: none;
  padding: 0;
}

.values-list li {
  margin-bottom: 10px;
  line-height: 1.5;
}

/* Статистика */
.bank-stats {
  margin: 60px 0;
  text-align: center;
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 30px;
  margin-top: 30px;
}

.stat-item {
  padding: 20px;
}

.stat-number {
  font-size: 2.5rem;
  font-weight: bold;
  color: #27ae60;
}

.stat-label {
  color: #666;
  font-size: 1rem;
}

/* История развития */
.history-section, .awards-section, .leadership-section {
  margin: 60px 0;
}

.timeline {
  position: relative;
  max-width: 800px;
  margin: 0 auto;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 50%;
  top: 0;
  bottom: 0;
  width: 2px;
  background: #ddd;
}

.timeline-item {
  position: relative;
  margin-bottom: 40px;
  padding-left: 40px;
}

.year {
  position: absolute;
  left: -60px;
  top: 0;
  width: 40px;
  text-align: center;
  font-weight: bold;
  color: #27ae60;
}

/* Награды */
.awards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 25px;
  margin-top: 30px;
}

.award-item {
  background: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  text-align: center;
}

.award-item h4 {
  color: #2c3e50;
  margin-bottom: 10px;
}

/* Руководство банка */
.leadership-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  margin-top: 30px;
}

.leader-card {
  text-align: center;
  background: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.leader-photo {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  overflow: hidden;
  margin: 0 auto 15px;
}

.leader-photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.leader-card h4 {
  color: #2c3e50;
  margin-bottom: 8px;
}

.leader-card p {
  color: #666;
  line-height: 1.4;
}

/* Адаптивность */
@media (max-width: 768px) {
  .bank-overview {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  
  .timeline::before {
    left: 20px;
  }
  
  .timeline-item {
    padding-left: 60px;
  }
  
  .year {
    left: -40px;
  }
  
  .page-header h1 {
    font-size: 2rem;
  }
  
  .stat-number {
    font-size: 2rem;
  }
}

@media (max-width: 480px) {
  .container {
    padding: 0 15px;
  }
  
  .stats-grid,
  .awards-grid,
  .leadership-grid {
    grid-template-columns: 1fr;
  }
  
  .overview-text h2 {
    font-size: 1.8rem;
  }
}
</style>
<section class="about-bank">
  <div class="container">
    <header class="page-header">
      <h1>О нашем банке</h1>
      <p>Надежный финансовый партнер с многолетним опытом работы</p>
    </header>

    <!-- Основной блок с описанием -->
    <div class="bank-overview">
      <div class="overview-text">
        <h2>Наше видение</h2>
        <p>Мы стремимся стать ведущим универсальным банком России, предоставляя инновационные финансовые решения для частных лиц и бизнеса.</p>
        <p>С 2005 года мы успешно развиваемся на финансовом рынке, постоянно совершенствуя наши продукты и услуги.</p>

        <h3>Наши ценности</h3>
        <ul class="values-list">
          <li><strong>Надежность:</strong> стабильная работа в любых экономических условиях</li>
          <li><strong>Клиентоориентированность:</strong> индивидуальный подход к каждому клиенту</li>
          <li><strong>Инновации:</strong> внедрение современных технологий</li>
          <li><strong>Прозрачность:</strong> честные условия и понятные тарифы</li>
        </ul>
      </div>
      <div class="overview-image">
        <img src="images/34.jfif" alt="Здание головного офиса банка" style="width: 100%; border-radius: 8px;">
      </div>
    </div>

    <!-- Статистика -->
    <div class="bank-stats">
      <h2>Ключевые показатели</h2>
      <div class="stats-grid">
        <div class="stat-item">
          <div class="stat-number">18 лет</div>
          <div class="stat-label">на рынке</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">2,5 млн</div>
          <div class="stat-label">клиентов</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">300+</div>
          <div class="stat-label">отделений</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">50 млрд ₽</div>
          <div class="stat-label">активы</div>
        </div>
      </div>
    </div>

    <!-- История развития -->
    <section class="history-section">
      <h2>История развития</h2>
      <div class="timeline">
        <div class="timeline-item">
          <span class="year">2005</span>
          <p>Основание банка, получение лицензии ЦБ РФ</p>
        </div>
        <div class="timeline-item">
          <span class="year">2010</span>
          <p>Запуск интернет‑банка для физических лиц</p>
        </div>
        <div class="timeline-item">
          <span class="year">2015</span>
          <p>Расширение сети отделений до 100 по всей стране</p>
        </div>
        <div class="timeline-item">
          <span class="year">2020</span>
          <p>Внедрение мобильного приложения с биометрической авторизацией</p>
        </div>
        <div class="timeline-item">
          <span class="year">2023</span>
          <p>Запуск экосистемы финансовых услуг</p>
        </div>
      </div>
    </section>

    <!-- Награды и достижения -->
    <section class="awards-section">
      <h2>Награды и достижения</h2>
      <div class="awards-grid">
        <div class="award-item">
          <h4>«Лучший розничный банк»</h4>
          <p>2022 год, премия «Финансовый Олимп»</p>
        </div>
        <div class="award-item">
          <h4>«Инновации в цифровом банкинге»</h4>
          <p>2021 год, международная премия FinTech Awards</p>
        </div>
        <div class="award-item">
          <h4>Рейтинг надежности ААА</h4>
          <p>2023 год, агентство «Эксперт РА»</p>
        </div>
      </div>
    </section>

    <!-- Команда руководства -->
    <section class="leadership-section">
      <h2>Руководство банка</h2>
      <div class="leadership-grid">
        <div class="leader-card">
          <div class="leader-photo">
            <img src="images/ceo.jpg" alt="Генеральный директор" style="width: 100%;">
          </div>
          <h4>Иванов Алексей Петрович</h4>
          <p>Генеральный директор</p>
          <p>Опыт работы в банковской сфере — 20 лет</p>
        </div>
      </div>
    </section>
  </div>
</section>

</section>

@endsection