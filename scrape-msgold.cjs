const puppeteer = require('puppeteer');

(async () => {
  const browser = await puppeteer.launch({ headless: true });
  const page = await browser.newPage();

  await page.goto('https://msgold.com.my/', {
    waitUntil: 'domcontentloaded'
  });

  // ⏳ WAIT until cus0 has numbers
  await page.waitForFunction(() => {
    const el = document.getElementById('cus0');
    if (!el) return false;
    return /\d/.test(el.innerText);
  }, { timeout: 15000 });

  const prices = await page.evaluate(() => {
    let data = {};
    for (let i = 0; i <= 5; i++) {
      const el = document.getElementById('cus' + i);
      data['cus' + i] = el ? el.innerText.trim() : null;
    }
    return data;
  });

  console.log(JSON.stringify(prices));
  await browser.close();
})();
