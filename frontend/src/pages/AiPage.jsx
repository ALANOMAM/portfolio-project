import styles from "../styles/WorkPagesStyle.module.css";
import Projects from "../components/Projects";

function AiPage() {
  const category = 1;
  return (
    <div>
      <h1 className={styles.title}>Ai Projects</h1>
      <Projects categoryIdProp={category} showComingSoonIfEmpty={true} />
    </div>
  );
}

export default AiPage;

// import styles from "../styles/WorkPagesStyle.module.css";
// import Projects from "../components/Projects";

// function AiPage() {
//   //based on how i seed the category table, this page corresponds to this category
//   const category = 1;
//   return (
//     <div>
//       <h1 className={styles.title}>Ai Projects</h1>
//       <Projects categoryIdProp={category} />
//     </div>
//   );
// }

// export default AiPage;
