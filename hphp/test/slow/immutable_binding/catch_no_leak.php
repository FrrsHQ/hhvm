<?hh // experimental
<<__EntryPoint>> function main(): void {
let x = 42;
try {
  throw new Exception();
} catch (Exception e) {
  let x = "42";
}
var_dump(x);
}
