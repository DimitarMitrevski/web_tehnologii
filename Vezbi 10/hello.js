function capitalize(word) {
  return word.charAt(0).toUpperCase() + word.slice(1);
}

function hello(name) {
  return "Hello " + capitalize(name);
}

console.log(hello("petar (JavaScript)"));
console.log(hello("jovana (JavaScript)"));
console.log(hello("stefan (JavaScript)"));