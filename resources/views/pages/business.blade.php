@extends('layouts.app')
@section('content')
<style>
.business-page {
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

.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
}

.service-card {
  background: white;
  border-radius: 8px;
  padding: 25px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  text-align: center;
}

.service-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
}

.service-icon {
  font-size: 3rem;
  margin-bottom: 15px;
}

.service-card h3 {
  color: #2c3e50;
  margin-bottom: 15px;
  font-size: 1.5rem;
}

.service-card p {
  color: #555;
  margin-bottom: 20px;
  line-height: 1.5;
}

.service-features {
  list-style: none;
  padding: 0;
  margin: 0;
}

.service-features li {
  padding: 8px 0;
  color: #777;
  position: relative;
  padding-left: 20px;
}

.service-features li:before {
  content: "✓";
  color: #27ae60;
  position: absolute;
  left: 0;
}

/* Адаптивность */
@media (max-width: 768px) {
  .services-grid {
    grid-template-columns: 1fr;
  }
  
  .page-header h1 {
    font-size: 2rem;
  }
  
  .page-header p {
    font-size: 1rem;
  }
}

@media (max-width: 480px) {
  .container {
    padding: 0 15px;
  }
  
  .service-card {
    padding: 20px 15px;
  }
}
</style>
<section class="business-page">
  <div class="container">
    <header class="page-header">
      <h1>Банковские услуги для бизнеса</h1>
      <p>Комплексное финансовое сопровождение для компаний любого масштаба</p>
    </header>

    <div class="services-grid">
      <!-- Услуга 1: Расчётное обслуживание -->
      <div class="service-card">
        <div class="service-icon">💰</div>
        <h3>Расчётное обслуживание</h3>
        <p>Открытие и ведение расчётных счетов с выгодными тарифами. Быстрый доступ к средствам в любое время.</p>
        <ul class="service-features">
          <li>Бесплатные переводы внутри банка</li>
          <li>Выгодные тарифы на межбанковские переводы</li>
          <li>Онлайн‑банк 24/7</li>
          <li>Интеграция с 1С и другими системами</li>
        </ul>
      </div>

      <!-- Услуга 2: Кредиты для бизнеса -->
      <div class="service-card">
        <div class="service-icon">💵</div>
        <h3>Кредиты для бизнеса</h3>
        <p>Финансирование развития компании на выгодных условиях. Гибкие сроки и прозрачные условия.</p>
        <ul class="service-features">
          <li>Сумма до 50 млн руб.</li>
          <li>Ставка от 12 % годовых</li>
          <li>Срок до 5 лет</li>
          <li>Быстрое рассмотрение заявки</li>
        </ul>
      </div>

      <!-- Услуга 3: Корпоративные карты -->
      <div class="service-card">
        <div class="service-icon">💳</div>
        <h3>Корпоративные карты</h3>
        <p>Контроль расходов и удобство расчётов для сотрудников. Разные уровни доступа и лимиты.</p>
        <ul class="service-features">
          <li>Кэшбэк до 5 %</li>
          <li>Лимиты по сотрудникам</li>
          <li>Мгновенная блокировка</li>
          <li>Отчёты по тратам</li>
        </ul>
      </div>

      <!-- Услуга 4: Зарплатные проекты -->
      <div class="service-card">
        <div class="service-icon">💸</div>
        <h3>Зарплатные проекты</h3>
        <p>Автоматизация выплат сотрудникам. Экономия времени и снижение издержек.</p>
        <ul class="service-features">
          <li>Бесплатное обслуживание</li>
          <li>Быстрые переводы</li>
          <li>Персональный менеджер</li>
          <li>Аналитика по выплатам</li>
        </ul>
      </div>

      <!-- Услуга 5: ВЭД и валютный контроль -->
      <div class="service-card">
        <div class="service-icon">🌐</div>
        <h3>ВЭД и валютный контроль</h3>
        <p>Полное сопровождение внешнеэкономической деятельности. Консультации и поддержка.</p>
        <ul class="service-features">
          <li>Валютные счета</li>
          <li>Конвертация по выгодному курсу</li>
          <li>Помощь в оформлении документов</li>
          <li>Консультации экспертов</li>
        </ul>
      </div>

      <!-- Услуга 6: Эквайринг -->
      <div class="service-card">
        <div class="service-icon">🛒</div>
        <h3>Эквайринг</h3>
        <p>Приём безналичных платежей в торговой точке или онлайн. Простое подключение.</p>
        <ul class="service-features">
          <li>Комиссия от 1,8 %</li>
          <li>Терминалы в аренду</li>
          <li>Интернет‑эквайринг</li>
          <li>Техническая поддержка</li>
        </ul>
      </div>
    </div>
  </div>
</section>

@endsection