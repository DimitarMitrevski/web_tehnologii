/* @ts-ignore */
function capitalize(word: string): string {
  return word.charAt(0).toUpperCase() + word.slice(1);
}
/* @ts-ignore */
function hello(name: string): string {
  return "Hello " + capitalize(name);
}

console.log(hello("petar (TypeScript)"));
console.log(hello("jovana (TypeScript)"));
console.log(hello("stefan (TypeScript)"));
