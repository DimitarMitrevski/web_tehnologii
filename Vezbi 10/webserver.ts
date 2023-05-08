/* @ts-ignore */
import { Application } from "https://deno.land/x/oak/mod.ts";
/* @ts-ignore */
import { Router } from "https://deno.land/x/oak/mod.ts";

const app = new Application();
const router: any = new Router();

router.get("/students", async (ctx: any) => {
  const std = await JSON.parse(await Deno.readTextFile("./studenti.json"));

  ctx.response.body = JSON.stringify(std.studenti);
});

router.post("/add/student", async (ctx: any) => {
  // const std = await JSON.parse(await Deno.readTextFile("./studenti.json"));
  const reqBody = await ctx.request.body().value;
  const std = await JSON.parse(await Deno.readTextFile("./studenti.json"));
  std.studenti.push(reqBody);
  await Deno.writeTextFile("./studenti.json", JSON.stringify(std));
  ctx.response.body = "OK";
  //ctx.response.body = JSON.stringify(std.studenti);
});

app.use(router.routes());
app.use(async (ctx) => {
  try {
    await ctx.send({
      root: `${Deno.cwd()}`,
      index: "index.html",
    });
  } catch {
    ctx.response.status = 404;
    ctx.response.body = "404 File not found";
  }
});

await app.listen({ hostname: "localhost", port: 8000 });
