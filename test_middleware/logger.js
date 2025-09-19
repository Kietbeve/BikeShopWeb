const fs = require('fs');
const path = require('path');

const logFilePath = path.join(__dirname, 'request.log');

const requestLogger = (req, res, next) => {
  const timestamp = new Date().toISOString();
  const ip = req.headers['x-forwarded-for'] || req.socket.remoteAddress;
  const logEntry = `[${timestamp}] ${req.method} ${req.originalUrl} - IP: ${ip}\n`;

  fs.appendFile(logFilePath, logEntry, (err) => {
    if (err) {
      console.error('Lỗi ghi log:', err);
    }
  });

  next();
};

module.exports = requestLogger;
