<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Tampilan login modern, responsif, dan elegan." />
  <title>Login | Welcome Back</title>

  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1d4ed8;
      --secondary: #7c3aed;
      --text: #0f172a;
      --muted: #64748b;
      --border: #dbeafe;
      --white: #ffffff;
      --danger: #dc2626;
      --success: #16a34a;
      --shadow: 0 28px 70px rgba(15, 23, 42, 0.22);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      min-height: 100vh;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", sans-serif;
      color: var(--text);
      background:
        radial-gradient(circle at 15% 20%, rgba(96, 165, 250, 0.55), transparent 34%),
        radial-gradient(circle at 85% 25%, rgba(167, 139, 250, 0.5), transparent 30%),
        linear-gradient(135deg, #eff6ff 0%, #eef2ff 48%, #f5f3ff 100%);
      display: grid;
      place-items: center;
      padding: 32px 18px;
      overflow-x: hidden;
    }

    .blob {
      position: fixed;
      border-radius: 999px;
      filter: blur(2px);
      opacity: 0.7;
      z-index: 0;
      animation: float 8s ease-in-out infinite;
    }

    .blob.one {
      width: 220px;
      height: 220px;
      background: rgba(59, 130, 246, 0.2);
      top: -70px;
      left: -40px;
    }

    .blob.two {
      width: 260px;
      height: 260px;
      background: rgba(124, 58, 237, 0.18);
      right: -80px;
      bottom: -90px;
      animation-delay: -2s;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-18px) rotate(4deg); }
    }

    .login-shell {
      position: relative;
      z-index: 1;
      width: min(100%, 980px);
      min-height: 610px;
      display: grid;
      grid-template-columns: 1.05fr 0.95fr;
      border: 1px solid rgba(255, 255, 255, 0.7);
      border-radius: 30px;
      overflow: hidden;
      background: rgba(255, 255, 255, 0.72);
      backdrop-filter: blur(18px);
      box-shadow: var(--shadow);
    }

    .visual-panel {
      position: relative;
      padding: 56px;
      color: var(--white);
      background:
        linear-gradient(160deg, rgba(37, 99, 235, 0.92), rgba(124, 58, 237, 0.9)),
        url("https://images.unsplash.com/photo-1557683316-973673baf926?auto=format&fit=crop&w=1200&q=85")
          center/cover;
      isolation: isolate;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .visual-panel::after {
      content: "";
      position: absolute;
      inset: 0;
      background:
        linear-gradient(to bottom right, rgba(255,255,255,0.10), transparent 45%),
        repeating-linear-gradient(
          135deg,
          rgba(255,255,255,0.05) 0 1px,
          transparent 1px 22px
        );
      z-index: -1;
    }

    .brand {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      font-weight: 800;
      letter-spacing: 0.3px;
      font-size: 1.05rem;
    }

    .brand-badge {
      width: 42px;
      height: 42px;
      border-radius: 14px;
      display: grid;
      place-items: center;
      background: rgba(255, 255, 255, 0.18);
      border: 1px solid rgba(255, 255, 255, 0.35);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
      font-size: 1.25rem;
    }

    .hero-copy {
      max-width: 440px;
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 18px;
      padding: 8px 12px;
      font-size: 0.78rem;
      font-weight: 700;
      border-radius: 999px;
      background: rgba(255, 255, 255, 0.14);
      border: 1px solid rgba(255, 255, 255, 0.24);
    }

    .hero-copy h1 {
      font-size: clamp(2.25rem, 5vw, 4rem);
      line-height: 1.02;
      margin-bottom: 18px;
      letter-spacing: -2px;
    }

    .hero-copy p {
      max-width: 390px;
      line-height: 1.75;
      color: rgba(255, 255, 255, 0.86);
      font-size: 0.98rem;
    }

    .quote {
      padding: 18px 20px;
      border-radius: 18px;
      background: rgba(255, 255, 255, 0.12);
      border: 1px solid rgba(255, 255, 255, 0.2);
      font-size: 0.88rem;
      line-height: 1.65;
      color: rgba(255, 255, 255, 0.9);
    }

    .form-panel {
      padding: 58px 56px;
      background: rgba(255, 255, 255, 0.9);
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-header {
      margin-bottom: 30px;
    }

    .form-header span {
      display: inline-block;
      margin-bottom: 10px;
      color: var(--primary);
      font-size: 0.82rem;
      font-weight: 800;
      letter-spacing: 1.2px;
      text-transform: uppercase;
    }

    .form-header h2 {
      font-size: clamp(2rem, 4vw, 2.8rem);
      letter-spacing: -1.5px;
      margin-bottom: 10px;
    }

    .form-header p {
      color: var(--muted);
      line-height: 1.65;
    }

    .field {
      margin-bottom: 19px;
    }

    .field label {
      display: block;
      margin-bottom: 9px;
      font-size: 0.88rem;
      font-weight: 700;
    }

    .input-wrap {
      position: relative;
    }

    .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #64748b;
      pointer-events: none;
      display: grid;
      place-items: center;
    }

    .input-wrap input {
      width: 100%;
      height: 54px;
      padding: 0 48px 0 48px;
      border: 1px solid #cbd5e1;
      border-radius: 16px;
      background: rgba(248, 250, 252, 0.9);
      color: var(--text);
      font-size: 0.96rem;
      outline: none;
      transition: 0.25s ease;
    }

    .input-wrap input::placeholder {
      color: #94a3b8;
    }

    .input-wrap input:focus {
      border-color: var(--primary);
      background: var(--white);
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }

    .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      width: 38px;
      height: 38px;
      border: 0;
      background: transparent;
      color: #64748b;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.2s ease;
    }

    .toggle-password:hover {
      background: #e2e8f0;
      color: var(--primary);
    }

    .form-options {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin: 3px 0 24px;
      font-size: 0.87rem;
    }

    .checkbox {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      color: #475569;
      cursor: pointer;
    }

    .checkbox input {
      width: 17px;
      height: 17px;
      accent-color: var(--primary);
    }

    a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 700;
    }

    a:hover {
      color: var(--primary-dark);
    }

    .login-button {
      width: 100%;
      height: 56px;
      border: 0;
      border-radius: 16px;
      color: var(--white);
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      font-size: 0.98rem;
      font-weight: 800;
      letter-spacing: 0.2px;
      cursor: pointer;
      box-shadow: 0 15px 30px rgba(37, 99, 235, 0.25);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .login-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 18px 36px rgba(37, 99, 235, 0.34);
    }

    .login-button:active {
      transform: translateY(0);
    }

    .divider {
      display: flex;
      align-items: center;
      gap: 14px;
      margin: 25px 0;
      color: #94a3b8;
      font-size: 0.78rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.9px;
    }

    .divider::before,
    .divider::after {
      content: "";
      height: 1px;
      flex: 1;
      background: #e2e8f0;
    }

    .google-button {
      width: 100%;
      height: 52px;
      border: 1px solid #cbd5e1;
      border-radius: 16px;
      background: var(--white);
      color: #334155;
      font-size: 0.92rem;
      font-weight: 750;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 11px;
      transition: 0.2s ease;
    }

    .google-button:hover {
      border-color: #94a3b8;
      background: #f8fafc;
      transform: translateY(-1px);
    }

    .signup {
      margin-top: 26px;
      text-align: center;
      color: var(--muted);
      font-size: 0.9rem;
    }

    .message {
      display: none;
      margin-bottom: 18px;
      padding: 12px 14px;
      border-radius: 13px;
      font-size: 0.86rem;
      line-height: 1.5;
    }

    .message.error {
      display: block;
      color: #991b1b;
      background: #fef2f2;
      border: 1px solid #fecaca;
    }

    .message.success {
      display: block;
      color: #166534;
      background: #f0fdf4;
      border: 1px solid #bbf7d0;
    }

    @media (max-width: 820px) {
      body {
        padding: 20px 14px;
      }

      .login-shell {
        grid-template-columns: 1fr;
        width: min(100%, 560px);
        border-radius: 24px;
      }

      .visual-panel {
        min-height: 280px;
        padding: 34px;
      }

      .hero-copy h1 {
        margin-top: 28px;
        font-size: 2.55rem;
      }

      .quote {
        display: none;
      }

      .form-panel {
        padding: 40px 30px;
      }
    }

    @media (max-width: 480px) {
      .visual-panel {
        padding: 28px 24px;
      }

      .hero-copy h1 {
        font-size: 2.1rem;
      }

      .hero-copy p {
        font-size: 0.9rem;
      }

      .form-panel {
        padding: 34px 22px;
      }

      .form-options {
        align-items: flex-start;
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="blob one"></div>
  <div class="blob two"></div>

  <main class="login-shell">
    <section class="visual-panel">
      <div class="brand">
        <div class="brand-badge">M</div>
        <span>MentorSpace</span>
      </div>

      <div class="hero-copy">
        <div class="eyebrow">✨ Platform belajar masa depan</div>
        <h1>Selamat datang kembali.</h1>
        <p>
          Masuk ke akun Anda untuk melanjutkan proses belajar, mengakses kelas,
          dan mengembangkan kompetensi profesional.
        </p>
      </div>

      <div class="quote">
        “Kesuksesan dimulai dari satu langkah kecil yang dilakukan secara konsisten.”
      </div>
    </section>

    <section class="form-panel">
      <div class="form-header">
        <span>Member Login</span>
        <h2>Masuk ke akun</h2>
        <p>Silakan masukkan email dan kata sandi Anda.</p>
      </div>

      <div id="message" class="message" role="alert"></div>

      <form id="loginForm" novalidate>
        <div class="field">
          <label for="email">Alamat Email</label>
          <div class="input-wrap">
            <span class="input-icon" aria-hidden="true">
              <svg width="19" height="19" viewBox="0 0 24 24" fill="none">
                <path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="1.8" rx="2"/>
                <path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="1.8"/>
              </svg>
            </span>
            <input
              id="email"
              name="email"
              type="email"
              placeholder="nama@email.com"
              autocomplete="email"
              required
            />
          </div>
        </div>

        <div class="field">
          <label for="password">Kata Sandi</label>
          <div class="input-wrap">
            <span class="input-icon" aria-hidden="true">
              <svg width="19" height="19" viewBox="0 0 24 24" fill="none">
                <rect x="5" y="10" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.8"/>
                <path d="M8 10V7a4 4 0 1 1 8 0v3" stroke="currentColor" stroke-width="1.8"/>
              </svg>
            </span>
            <input
              id="password"
              name="password"
              type="password"
              placeholder="Masukkan kata sandi"
              autocomplete="current-password"
              minlength="6"
              required
            />
            <button
              class="toggle-password"
              type="button"
              id="togglePassword"
              aria-label="Tampilkan kata sandi"
              title="Tampilkan kata sandi"
            >
              👁
            </button>
          </div>
        </div>

        <div class="form-options">
          <label class="checkbox">
            <input type="checkbox" name="remember" />
            <span>Ingat saya</span>
          </label>

          <a href="#">Lupa kata sandi?</a>
        </div>

        <button class="login-button" type="submit">Masuk Sekarang</button>

        <div class="divider">atau lanjutkan dengan</div>

        <button class="google-button" type="button">
          <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="#4285F4" d="M21.35 12.2c0-.7-.06-1.2-.2-1.75H12v3.32h5.37a4.6 4.6 0 0 1-2 3.02v2.15h3.24c1.9-1.75 2.74-4.33 2.74-6.74Z"/>
            <path fill="#34A853" d="M12 21.7c2.7 0 4.97-.9 6.62-2.76l-3.24-2.15c-.9.6-2.05.96-3.38.96-2.6 0-4.82-1.76-5.61-4.13H3.04v2.22A10 10 0 0 0 12 21.7Z"/>
            <path fill="#FBBC05" d="M6.39 13.62A6 6 0 0 1 6.08 12c0-.56.11-1.1.3-1.62V8.16H3.05A10 10 0 0 0 2 12c0 1.38.28 2.7 1.04 3.84l3.35-2.22Z"/>
            <path fill="#EA4335" d="M12 6.25c1.47 0 2.8.5 3.84 1.5l2.88-2.88A9.68 9.68 0 0 0 12 2.3a10 10 0 0 0-8.96 5.86l3.35 2.22C7.18 8 9.4 6.25 12 6.25Z"/>
          </svg>
          Masuk dengan Google
        </button>

        <p class="signup">
          Belum punya akun? <a href="#">Daftar sekarang</a>
        </p>
      </form>
    </section>
  </main>

  <script>
    const form = document.getElementById("loginForm");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const togglePassword = document.getElementById("togglePassword");
    const message = document.getElementById("message");

    togglePassword.addEventListener("click", () => {
      const isPassword = password.type === "password";
      password.type = isPassword ? "text" : "password";
      togglePassword.textContent = isPassword ? "🙈" : "👁";
      togglePassword.setAttribute(
        "aria-label",
        isPassword ? "Sembunyikan kata sandi" : "Tampilkan kata sandi"
      );
    });

    form.addEventListener("submit", (event) => {
      event.preventDefault();

      message.className = "message";
      message.textContent = "";

      if (!email.value.trim() || !password.value.trim()) {
        message.className = "message error";
        message.textContent = "Email dan kata sandi wajib diisi.";
        return;
      }

      if (!email.checkValidity()) {
        message.className = "message error";
        message.textContent = "Format email belum valid.";
        return;
      }

      if (password.value.length < 6) {
        message.className = "message error";
        message.textContent = "Kata sandi minimal terdiri dari 6 karakter.";
        return;
      }

      message.className = "message success";
      message.textContent =
        "Tampilan login berhasil dijalankan. Hubungkan form ini ke backend untuk proses autentikasi.";
    });
  </script>
</body>
</html>