import React, { useState, useEffect } from "react";
import styled from "styled-components";
import { HashRouter as Router, Switch, Route } from "react-router-dom";
import Header from "../Header";
import LoginPage from "../../pages/Login";
import HomePage from "../../pages/Home";
import AboutPage from "../../pages/About";
import PostPage from "../../pages/Post";
import NewPostPage from "../../pages/NewPost";
import RegisterPage from "../../pages/Register";
import { AuthContext } from "../../contexts";
import { getMe } from "../../WebApi";

const PageWrapper = styled.div`
  padding: 72px 0 0;
`;
const BodyWrapper = styled.div`
  display: flex;
  justify-content: center;
  align-items: center;
`;
function App() {
  const [user, setUser] = useState(null);
  useEffect(() => {
    getMe().then((res) => {
      if (res.ok) {
        setUser(res.data);
      }
    }, []);
  });
  return (
    <AuthContext.Provider value={{ user, setUser }}>
      <PageWrapper>
        <Router>
          <Header />
          <BodyWrapper>
            <Switch>
              <Route path="/about">
                <AboutPage />
              </Route>
              <Route path="/login">
                <LoginPage />
              </Route>
              <Route path="/register">
                <RegisterPage />
              </Route>
              <Route exact path="/">
                <HomePage />
              </Route>
              <Route path="/posts/:id">
                <PostPage />
              </Route>
              <Route path="/new-post">
                <NewPostPage />
              </Route>
            </Switch>
          </BodyWrapper>
        </Router>
      </PageWrapper>
    </AuthContext.Provider>
  );
}

export default App;
