async function metric() {
  let response = await fetch("https://api.ipify.org?format=json");
  let data = await response.json();
  let ip = data.ip;
  let os = navigator.platform;

  response = await fetch(`http://ipwho.is/${data.ip}?lang=ru`);
  let { city, country, region } = await response.json();
  return { city, country, region, ip, os };
}

metric().then((value) => {
  fetch("/?api-metric-save", {
    method: "POST",
    body: JSON.stringify(value),
  });
});
