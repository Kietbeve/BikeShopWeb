const express = require('express');
const requestLogger = require('./logger');

const app = express();
const PORT = 3000;

app.use(requestLogger);

app.get('/', (req, res) => {
  res.send('Hello Phước 👋');
});

app.get('/test', (req, res) => {
  res.send('Đây là route test!');
});

app.listen(PORT, () => {
  console.log(`🚀 Server chạy tại http://localhost:${PORT}`);
});